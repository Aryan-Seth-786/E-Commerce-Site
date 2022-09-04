/** @type {import('tailwindcss').Config} */
module.exports = {
    purge: [
        './resources/js/**/*.{vue,js}',
        './resources/views/**/*.blade.php'
    ],
    content: [],
    theme: {
        extend: {
            keyframes: {
                click_animation: {
                    // 0%{
                    //     @apply text-red-900;
                    // }
                    // 100%{
                    //     @apply text-blue-900;
                    // }

                    '0%': {
                        

                    },
                    // '10%': { transform: 'rotate(14deg)' },
                    // '20%': { transform: 'rotate(-8deg)' },
                    // '30%': { transform: 'rotate(14deg)' },
                    // '40%': { transform: 'rotate(-4deg)' },
                    // '50%': { transform: 'rotate(10.0deg)' },
                    // '60%': { transform: 'rotate(0.0deg)' },

                    '100%': { textDecoration: 'none' },

                },

            },
            animation: {
                'click': 'click_animation 2s linear 1'
            }
        },
    },
    // daisyui: {
    //     themes: ["light", "dark", "cupcake", "bumblebee", "emerald", "corporate", "synthwave", "retro", "cyberpunk", "valentine", "halloween", "garden", "forest", "aqua", "lofi", "pastel", "fantasy", "wireframe", "black", "luxury", "dracula", "cmyk", "autumn", "business", "acid", "lemonade", "night", "coffee", "winter"],
    //   },
    // plugins: [require("daisyui")],

    plugins: []
}
