import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],

    server: {
        host: '0.0.0.0', // supaya bisa diakses dari device lain
        port: 5173,      // port vite (default)
        strictPort: true,
        hmr: {
            host: '10.70.2.151', // IP laptop kamu
        },
    },
})