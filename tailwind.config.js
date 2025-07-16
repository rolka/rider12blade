import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './node_modules/flowbite/**/*.js',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
        // todo: add my custom colors
        // colors: {
        //     primary: {
        //         DEFAULT: '#1D4ED8',
        //         dark: '#1E40AF',
        //         light: '#3B82F6',
        //     },
        //     secondary: {
        //         DEFAULT: '#F97316',
        //         dark: '#B45309',
        //         light: '#FB923C',
        //     },
        //     gray: {
        //         700: '#374151',
        //         800: '#1F2937',
        //     },
        // },
    },

    plugins: [
        forms,
        require('flowbite/plugin'),
    ],
};
