/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./public/**/*{html,js}'],
  theme: {
    extend: {
      fontFamily:{
        helvetica:["Helvetica", "sans-serif"],
        montserrat:["Montserrat", "sans-seric"]
      }
    },
  },
  plugins: [],
}
