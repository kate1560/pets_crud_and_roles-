import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },

            // paleta de colores personalizada para el proyecto 
            colors: {
                VetCream: "#FFF7EC",
                BorderSoft: "#E5EDEB",
                VetGreenSoft: "#DFF3EA",
                VetGreen: "#3FAF7A",
                VetBlue: "#2F6FED",
                VetRedSoft: "#FDE2E2",
                VetSand: "#E2CFAA",
                VetRose: "#F7C6D0",
            },
        },
    },

    plugins: [forms, typography],
};
