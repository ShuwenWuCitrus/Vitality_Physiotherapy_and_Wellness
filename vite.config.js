import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.js'],
<<<<<<< HEAD
            input: ['resources/css/app.css'],
=======
>>>>>>> 49ad8cae4aa4b1301d6224c312c6d023cf508fbf
            refresh: true,
        }),
    ],
});
