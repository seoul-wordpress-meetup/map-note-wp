import { defineConfig } from 'vite'
import react from '@vitejs/plugin-react-swc'

// https://vite.dev/config/
export default defineConfig({
  base: '',
  build: {
    manifest: true,
    modulePreload: {
      polyfill: true,
    },
    rollupOptions: {
      input: [
        'src/map-note.tsx',
      ],
    }
  },
  publicDir: false,
  plugins: [react()],
  server: {
    cors: {
      origin: '*',
    },
  },
})
