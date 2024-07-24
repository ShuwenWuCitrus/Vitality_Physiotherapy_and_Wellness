import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.js', 'resources/css/app.css'], // Now 
            // input: ['resources/css/app.css'], Before 
            // input: ['resources/js/app.js',], Before
            refresh: true,
        }),
    ],
});
