import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
<<<<<<< HEAD
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
=======
        laravel([
            'resources/css/app.css',
            'resources/js/app.js',
        ]),
>>>>>>> e1562245d3031c7dd768bad9414a16ed13bbafbf
    ],
});
