const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/**/*.js',
    ],
    theme: {
        extend: {
            screens:{
                'md2': '912px'
            },
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
            },
            colors: {
            },
            container: {
                center: true,
            },
        },
        plugins: [
            require('@tailwindcss/forms'),
            require('@tailwindcss/typography'),
            require('@tailwindcss/aspect-ratio'),
        ],
    }
}
