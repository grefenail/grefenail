import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import path from 'path'

export default defineConfig({
    optimizeDeps: {
        include: ["swiper/modules/effect-cube", "swiper/modules/pagination"],
        exclude: ['js-big-decimal']
    },
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    test: {
        // ...
    },
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'resources/js')
        },
    },
    
});
