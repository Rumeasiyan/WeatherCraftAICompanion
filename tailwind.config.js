import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primaryColorWeatherApp: "#65A3D6",
            },
            width: {
                "3/4vw": "75vw",
                "1/2vw": "50vw",
            },
            height: {
                "3/4vh": "75vh",
                "1/2vh": "50vh",
            },
        },
    },

    plugins: [forms],
};
