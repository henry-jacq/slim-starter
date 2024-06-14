import { defineConfig } from 'vite'
import path from 'path'

export default defineConfig({
    root: './', // Root is current directory
    build: {
        outDir: 'public/build', // Output directory for production build
        emptyOutDir: true, // Clean the output directory before building
        manifest: true, // Generate a manifest file
        rollupOptions: {
            input: {
                main: path.resolve(__dirname, 'resources/css/app.css'), // CSS entry point
            },
        },
    },
    server: {
        watch: {
            ignored: ['**/node_modules/**'] // Ignore node_modules
        },
        port: 5173, // Development server port
    }
})
