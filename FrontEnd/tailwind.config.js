/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./public/**/*{html,js}"],
  theme: {
    extend: {
      fontFamily: {
        montserrat: ["Montserrat", "sans-seric"],
        helvetica: ["Helvetica", "sans-seric"],
      },
    },
  },
  plugins: [],
};
