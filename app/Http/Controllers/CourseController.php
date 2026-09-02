<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Smalot\PdfParser\Parser;
use Illuminate\Support\Facades\Http;
use League\CommonMark\CommonMarkConverter;


class CourseController extends Controller
{

    //
     public function index()
    {
        $courses = Auth::user()
            ->courses()
            ->latest()
            ->get();

        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

   public function store(Request $request)
{
    $request->validate([
        'title' => ['required', 'string', 'max:255'],
        'file' => ['required', 'file', 'mimes:pdf,txt', 'max:10240'],
    ]);

    $file = $request->file('file');

    // Stockage du fichier
    $path = $file->store('courses', 'public');

    // Extraction du contenu
    $content = null;

    if ($file->getClientOriginalExtension() === 'pdf') {

        $parser = new Parser();

        $pdf = $parser->parseFile(
            Storage::disk('public')->path($path)
        );

        $content = $pdf->getText();

    } elseif ($file->getClientOriginalExtension() === 'txt') {

        $content = file_get_contents($file->getRealPath());
    }

    // Enregistrement en base de données
    Course::create([
        'user_id' => Auth::id(),
        'title' => $request->title,
        'file_name' => $file->getClientOriginalName(),
        'file_path' => $path,
        'content' => $content,
    ]);

    return redirect()
        ->route('courses.index')
        ->with('success', 'Cours téléversé et texte extrait avec succès.');
}

public function summarize(Course $course)
{
    // Vérifier que le cours appartient bien à l'utilisateur connecté
    if ($course->user_id !== Auth::id()) {
        abort(403);
    }

    // Vérifier qu'un texte a bien été extrait
    if (empty($course->content)) {
        return back()->with(
            'error',
            'Impossible de générer le résumé : le contenu du cours est vide.'
        );
    }

    try {

        $response = Http::timeout(120)
            ->post(
                config('services.ai_service.url') . '/api/summarize',
                [
                    'text' => $course->content,
                ]
            );

        if ($response->failed()) {

            return back()->with(
                'error',
                'Le service IA a rencontré une erreur.'
            );
        }

        $data = $response->json();

        // Enregistrer le résumé dans la base de données
        $course->update([
            'summary' => $data['summary'] ?? null,
        ]);

        return back()->with(
            'success',
            'Résumé généré avec succès !'
        );

    } catch (\Exception $e) {

        return back()->with(
            'error',
            'Impossible de contacter le service IA.'
        );
    }
}
}
