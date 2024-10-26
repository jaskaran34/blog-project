/** @type {import('tailwindcss').Config} */

import typography from '@tailwindcss/typography'
import forms from '@tailwindcss/forms'
export default {
  content: [
    "./index.html",
    "./src/**/*.{vue,js,jsx,ts,tsx}",
  ],
  theme: {
    extend: {},
  },
  plugins: [
typography,
forms

  ],
}

