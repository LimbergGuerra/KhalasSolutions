import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography'; // Plugin recomendado para texto estilizado
import lineClamp from '@tailwindcss/line-clamp'; // Plugin para limitar texto en líneas

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
                primary: '#004085', // Azul oscuro como color principal
                secondary: '#FFD700', // Amarillo dorado como color secundario
                accent: '#FF4500', // Naranja rojizo como color de acento
            },
            spacing: {
                '128': '32rem', // Espaciado personalizado
                '144': '36rem',
            },
            backgroundImage: {
                'hero-pattern': "url('/path-to-your-image.jpg')", // Fondo para la sección Hero
            },
        },
    },

    plugins: [
        forms,
        typography, // Plugin de tipografía
        lineClamp, // Plugin para limitar texto
    ],
};
