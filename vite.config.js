import { defineConfig } from 'vite';
import path from 'path';

export default defineConfig({
    root: './', // Root is current directory
    css: {
        postcss: './postcss.config.js',
    },
    build: {
        outDir: 'public/build', // Output directory for production build
        emptyOutDir: true, // Clean the output directory before building
        manifest: true, // Generate a manifest file
        rollupOptions: {
            input: {
                main: path.resolve(__dirname, 'resources/js/main.js'), // JavaScript entry point
                css: path.resolve(__dirname, 'resources/css/app.css') // CSS entry point
            },
            output: {
                assetFileNames: 'assets/[name].[hash].[ext]',
                entryFileNames: 'assets/[name].[hash].js',
                chunkFileNames: 'assets/[name].[hash].js',
            },
        },
    },
    server: {
        watch: {
            ignored: ['**/node_modules/**'], // Ignore node_modules
        },
        port: 5173, // Development server port
    },
});
