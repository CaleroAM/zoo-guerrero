import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/css/custom.css',
                'resources/css/custom-forms.css',
                'resources/css/app.css',
                'resources/js/species.js',
                'resources/js/zones.js',
                'resources/js/suppliers.js',
                'resources/js/components/notifications.js',
            ],
            refresh: true,
        }),
    ],
});
