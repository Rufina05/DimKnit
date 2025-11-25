import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/js/search.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        host: true,        // слушать все интерфейсы
        port: 5173,        // фиксированный порт
        strictPort: true,  // не менять порт, если занят
        cors: {
            origin: ['http://localhost:8000', 'http://127.0.0.1:8000'],
            methods: ['GET', 'HEAD', 'OPTIONS'],
            allowedHeaders: ['*'],
        },
        hmr: {
            host: 'localhost', // или IP контейнера/машины
            clientPort: 5173,
        },
    },
});
