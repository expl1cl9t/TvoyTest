/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",

    ],
    theme: {
        extend: {
            backgroundImage:{
                'stena': "url('./resources/img/background.jpg')"
            }
        },
    },
    plugins: [],
    darkMode: 'selector'
}
const colors = require('tailwindcss/colors')
