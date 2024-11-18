/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.{css,js,php}", "./assets/**/*.{js,css,php}", "./components/*.{php,css,js}"],
  theme: {
    container: {
      center: true,
      padding: '1rem',
    },
  },
  plugins: [],
}