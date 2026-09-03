import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.data('themeSwitcher', () => ({
    dark: false,

    init() {
        const savedTheme = localStorage.getItem('smartcourse-theme');

        if (savedTheme) {
            this.dark = savedTheme === 'dark';
        } else {
            this.dark = window.matchMedia(
                '(prefers-color-scheme: dark)'
            ).matches;
        }

        this.applyTheme();
    },

    toggle() {
        this.dark = !this.dark;

        localStorage.setItem(
            'smartcourse-theme',
            this.dark ? 'dark' : 'light'
        );

        this.applyTheme();
    },

    applyTheme() {
        document.documentElement.classList.toggle(
            'dark',
            this.dark
        );
    }
}));

Alpine.start();