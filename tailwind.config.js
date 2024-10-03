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
            colors: {
                primary: '#67be7a', // Verde principal
                secondary: '#007A61', // Verde escuro
                black: '#000000', // Preto para textos principais
                grayLight: '#F5F5F5', // Cinza claro para fundos
                grayMedium: '#B0B0B0', // Cinza médio para textos secundários
            },
        },
    },

    plugins: [forms, typography],
};
