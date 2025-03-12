import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                "font-Arial": ["Arial"],
            },
        },
        fontSize: {
            ...defaultTheme.fontSize, 
            'tiny': '8px',
        },
        screens: {
            ...defaultTheme.screens,
            'll': '1440px',
            'x': '480px',
            'xs': '425px',
            'xxs': '375px',
            'us': '320px', 
        },
    },

    plugins: [forms],
};
