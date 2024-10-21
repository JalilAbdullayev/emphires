/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    ],
    theme: {
        screens: {
            'sm': '576px',
            'md': '768px',
            'lg': '992px',
            'xl': '1200px',
            '2xl': '1600px',
        },
        extend: {
            container: {
                center: true,
                padding: {
                    DEFAULT: '1rem',
                }
            },
        },
    },
    plugins: [],
    darkMode: 'false'
};
