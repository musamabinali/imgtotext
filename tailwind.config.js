const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        './resources/lang/**/*.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'fill-orange': '#ea580c',
            },
            fill: theme => ({
                orange: theme('colors.fill-orange'),
            }),
            animation: {
                'spin-slow': 'spin 3s linear infinite',
                wiggle: 'wiggle 1s ease-in-out infinite',
                'animate-ping': 'ping 1s ease-in-out infinite',
            },
            spacing: {
                '72': '18rem', // 72 pixels or any other value you prefer
            },

        }
    },

    plugins: [require('@tailwindcss/forms')],
};
