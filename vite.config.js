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

                'resources/assets/libs/datatables/css/dataTables.bootstrap5.min.css',
                'resources/assets/libs/datatables/css/buttons.bootstrap5.min.css',
                'resources/assets/libs/datatables/css/select.bootstrap5.min.css',



                // Theme Javascript files
                'resources/assets/libs/bootstrap/js/bootstrap.bundle.min.js',
                'resources/assets/libs/apexcharts/apexcharts.min.js',
                'resources/assets/libs/flatpickr/flatpickr.min.js',

                // Jquery
                'resources/assets/libs/jquery/jquery.min.js',
                'resources/assets/libs/datatables/js/jquery.dataTables.min.js',
                'resources/assets/libs/datatables/js/dataTables.bootstrap5.min.js',

                // DataTables Extensions Dependencies 
                'resources/assets/libs/jszip/jszip.min.js',
                'resources/assets/libs/pdfmake/pdfmake.min.js',
                'resources/assets/libs/pdfmake/vfs_fonts.js',
                'resources/assets/libs/datatables/js/dataTables.buttons.min.js',
                'resources/assets/libs/datatables/js/buttons.bootstrap5.min.js',
                'resources/assets/libs/datatables/js/buttons.html5.min.js',
                'resources/assets/libs/datatables/js/buttons.print.min.js',
                'resources/assets/libs/datatables/js/buttons.colVis.min.js',
                'resources/assets/libs/datatables/js/dataTables.select.min.js',
                'resources/assets/libs/lucide/lucide.min.js',
                
                // Reusable DataTables Initialization Controller 
                'resources/assets/js/datatables-init.js',
                
                // Javascript files
                'resources/assets/js/dashboard.js',
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
