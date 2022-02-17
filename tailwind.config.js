const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    mode: 'jit',
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './public/css/app.css',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors:{
                paleta_tesis_blanco: '#F9F7F7',
                paleta_tesis_gris: '#DBE2EF',
                paleta_tesis_celeste: '#3F72AF',
                paleta_tesis_azul: '#112D4E',
            }
        },
       
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
