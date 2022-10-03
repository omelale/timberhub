/** @type {import('tailwindcss').Config} */
const colors = require('tailwindcss/colors')
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      colors: {
        gray: colors.trueGray,
        blue: colors.lightBlue,
        red: colors.rose,
        yellow: colors.amber,
      },
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}
