import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    build: {
        manifest: true,
        outDir: 'public/build',
        rollupOptions: {
            input: 'resources/js/app.js',
            output: {
                assetFileNames: '[name].[hash].[ext]',
                chunkFileNames: '[name].[hash].js',
                entryFileNames: '[name].[hash].js',
            }
        }
    },
    server: {
        cors: true, 
        host: 'localhost', 
    },
});

