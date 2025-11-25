/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  safelist: [
    // Добавляем все нужные текстовые и фоновые цвета, включая hover
    {
      pattern: /(text|bg|border|hover:text|hover:bg|hover:border)-(red|blue|yellow|green|gray|black|white)-(100|200|300|400|500|600|700|800|900)/,
    },
    'text-red-800',
    'hover:text-red-400',
    'bg-white',
  ],
  theme: {
    extend: {
      colors: {
        primary: '#fcd34d', 
        secondary: '#3b82f6', 
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'), 
  ],
}
