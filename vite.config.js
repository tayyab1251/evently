import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { bunny } from 'laravel-vite-plugin/fonts';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',    

                // Theme files for including in head
                'resources/assets/libs/bootstrap/css/bootstrap.min.css',
                'resources/assets/libs/bootstrap-icons/bootstrap-icons.css',
                'resources/assets/libs/apexcharts/apexcharts.css',
                'resources/assets/libs/flatpickr/flatpickr.min.css',
                'resources/assets/css/main.css',

                // Theme Javascript files
                'resources/assets/libs/bootstrap/js/bootstrap.bundle.min.js',
                'resources/assets/libs/apexcharts/apexcharts.min.js',
                'resources/assets/libs/flatpickr/flatpickr.min.js',
                'resources/assets/js/dashboard.js',

                // Javascript files
                'resources/js/app.js',

            ],
            assets: ['resources/assets/images/**'],
            refresh: true,
            fonts: [
                bunny('Instrument Sans', {
                    weights: [400, 500, 600],
                    optimizedFallbacks: false,
                }),
            ],
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
