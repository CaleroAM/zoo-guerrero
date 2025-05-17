import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        host: true, 
    },
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
                'resources/js/shifts.js',
                'resources/js/foods.js',
                'resources/js/lots.js',
                'resources/js/employees.js',
                'resources/js/dates.js',
                'resources/js/empshifts.js',
                'resources/js/animals.js',
                'resources/js/carefuls.js',
                'resources/js/components/notifications.js',
            ],
            refresh: true,
        }),
    ],
});
