import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        tailwindcss(),
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "node_modules/@fortawesome/fontawesome-free/css/all.min.css",
            ],
            refresh: true,
        }),
    ],
});
