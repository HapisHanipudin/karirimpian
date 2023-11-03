/** @type {import('tailwindcss').Config} */

const colors = require("tailwindcss/colors");

module.exports = {
  content: ["./src/**/*.{html,js,php}", "./**/*.{html,js,php}", "./*.{html,js,php}"],
  theme: {
    extend: {
      fontFamily: {
        inter: ["Inter"],
        teko: ["Teko"],
      },
      colors: {
        sky: colors.sky,
        blue: colors.blue,
      },
      animation: {
        notif: "notif 3s ease-in-out 1",
      },
      keyframes: {
        notif: {
          "0%, 100%": {
            opacity: 0,
            transform: "translateY(-125%)",
          },
          "25%, 75%": {
            opacity: 1,
            transform: "translateY(0)",
          },
        },
      },
    },
  },
  plugins: [],
};
