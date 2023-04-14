/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      'node_modules/preline/dist/*.js',
  ],
  theme: {
    extend: {
        fontFamily: {
            primary: ["Inter", ...defaultTheme.fontFamily.serif],
        },
        fontSize: {
            'xxs': '.625rem',
            'xs': '.75rem',
            'sm': '.875rem',
            'base': '1rem',
            'lg': '1.125rem',
            'xl': '1.25rem',
            '2xl': '1.5rem',
            '3xl': '1.875rem',
            '4xl': '2.25rem',
            '5xl': '3rem',
            '6xl': '4rem',
            '7xl': '5rem',
        },
    },
  },
  plugins: [
      require('@tailwindcss/forms'),
      require('preline/plugin'),
  ],
}

