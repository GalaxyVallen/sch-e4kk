/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        container: {
            center: true,
            screens: {
                xl: "1760px",
            },
        },
        backgroundPosition: {
            "right-center-bf": "190px 55%",
            "none-bf": "0",
        },
        keyframes: {
            shake: {
                "0%": {
                    transform: "translate(3px, 0)",
                },
                "50%": {
                    transform: "translate(-3px, 0)",
                },
                "100%": {
                    transform: "translate(0, 0)",
                },
            },
        },
        animation: {
            shake: "shake 150ms 2 linear",
        },
        fontFamily: {
            main: "'Alliance No.1'",
            headin: "'Satoshi'",
            mono: [
                "Fira Code VF",
                "ui-monospace",
                "SFMono-Regular",
                "Menlo",
                "Monaco",
                "Consolas",
                "Liberation Mono",
                "Courier New",
                "monospace",
            ],
        },
    },
    plugins: [require("flowbite/plugin")],
};
