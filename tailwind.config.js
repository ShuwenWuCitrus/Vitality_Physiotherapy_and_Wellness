import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        "./resources/**/*.blade.php",
        "./resources/**/**/**/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",


    ],
    safelist: [
        {
            pattern: /bg-+/ //including bg of all colors
        }

    ],
    theme: {
        colors: {
            'black': "#222222",
            'white': "#FFFFFF",
            'blue': "#4EA5D9",
            'yellow': "#FACA3C"
        },
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                inter: ['Inter', ...defaultTheme.fontFamily.sans]
            },
            backgroundImage: {
                'index-banner': "url('public/images/index-banner.png')"
            }
        },
    },

    plugins: [forms],
};
