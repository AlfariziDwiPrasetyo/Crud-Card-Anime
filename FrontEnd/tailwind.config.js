/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./public/**/*{html,js}'],
  theme: {
    extend: {
      fontFamily:{
        'montserrat' : ['Montserrat'],
        'press-start': ['"Press Start 2P"', 'cursive']
        
      }
    },
  },
  plugins: [],
}
