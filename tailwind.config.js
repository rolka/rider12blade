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

    darkMode: 'class',

    theme: {
        extend: {
            fontFamily: {
                // sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                sans: ['Inter', 'sans-serif'],
                // inter: ['Inter', 'sans-serif'],
            },
            colors: {
                white: '#fefefe',
                // 'pale-silver': '#ECF1F2',
                frost: '#ECF1F2',
                'deep-teal': '#1B3134',
                'dark-teal': '#0F353A',
                "dusty-teal": '#80A2A7',
                "ash-gray": '#AEAFAD',
                "shadow": '#C4D4D680',
                "shadow-light": '#C4D4D6',
                "desaturated-teal": '#41747B',
                "steel-teal": '#679095',
                "light-teal": '#878886',

                // "salad": '#41747B',

                // white: 'red',
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
            }
        },
    },

    plugins: [
        forms,
        require('flowbite/plugin'),
    ],
};
