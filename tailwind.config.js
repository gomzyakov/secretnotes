const {
    fontFamily
} = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        "./app/**/*.php",
        "./resources/**/*.html",
        "./resources/**/*.js",
        "./resources/**/*.jsx",
        "./resources/**/*.ts",
        "./resources/**/*.php",
        "./resources/**/*.vue"
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {

        extend: {
            inset: {
                '5/12': '44%',
            },
            screens: {
                '2sm': '350px',
            },
            fontFamily: {
                outfit: ['Outfit', ...fontFamily.sans],
                // 'default': ['Outfit', 'Arial'],
            },
        },
    },
    variants: {
        extend: {},
    },
    plugins: [],
}
