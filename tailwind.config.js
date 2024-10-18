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
                permanent: ['Permanent Marker', 'cursive'], 
                nunito: ['"Nunito"', 'sans-serif'],
                roboto: ['"Roboto"', 'sans-serif'],
            },
            fontWeight: {
                300: '300', // Roboto Light
                400: '400', // Default Normal Weight
                500: '500', // Nunito Medium
                600: '600', // Nunito Semi-Bold / Roboto Semi-Bold
                700: '700', // Nunito Bold / Roboto Bold
                800: '800', // Nunito Extra-Bold
                900: '900', // Permanent Marker Bold
            },
            fontSize: {
                'xs': '13px', // Roboto
                'sm': '15px', // Nunito
                'base': '16px', // Roboto
                'lg': '18px', // Roboto
                'xl': '20px', // Nunito
                '2xl': '24px', // Nunito
                '3xl': '36px', // Nunito
                '4xl': '48px', // Permanent Marker
            },
            colors: {
                primary: '#0D3892',
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
