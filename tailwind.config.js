import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: '#0C3C94',
                transparent: 'transparent',
                current: 'currentColor',
                white: '#ffffff',
                purple: '#3f3cbb',
                midnight: '#121063',
                metal: '#565584',
                tahiti: '#3ab7bf',
                silver: '#ecebff',
                'bubble-gum': '#ff77e9',
                bermuda: '#78dcca',
                'orange-500': '#F97316',
                'blue-900': '#1E3A8A',
            },
        },
    },
    plugins: [forms],
};
