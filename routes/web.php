<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {

    Route::get('/courses', [CourseController::class, 'index'])
        ->name('courses.index');

    Route::get('/courses/create', [CourseController::class, 'create'])
        ->name('courses.create');

    Route::post('/courses', [CourseController::class, 'store'])
        ->name('courses.store');

    Route::post('/courses/{course}/summarize', [CourseController::class, 'summarize'])
    ->name('courses.summarize');

    Route::get('/courses/{course}', [CourseController::class, 'show'])
    ->name('courses.show');

});
require __DIR__.'/auth.php';
