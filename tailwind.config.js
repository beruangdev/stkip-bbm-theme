const colors = require("tailwindcss/colors");
/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: "class",
  content: [
    // https://tailwindcss.com/docs/content-configuration
    "./**/*.php",
    "./inc/**/*.php",
    "./templates/**/*.php",
    "./template-parts/**/*.php",
    "./safelist.txt",
    //'./**/*.php', // recursive search for *.php (be aware on every file change it will go even through /node_modules which can be slow, read doc)
    // "./node_modules/flowbite/**/*.js",
  ],
  // safelist: [
  //   "text-center",
  //   //{
  //   //  pattern: /text-(white|black)-(200|500|800)/
  //   //}
  // ],
  theme: {
    extend: {
      boxShadow: {
        md: "0 4px 6px -1px rgb(0 0 0 / 0.3), 0 2px 4px -2px rgb(0 0 0 / 0.3)",
        lg: "0 10px 15px -3px rgb(0 0 0 / 0.3), 0 4px 6px -4px rgb(0 0 0 / 0.3)",
      },
    },
    colors: {
      // ...colors,
      primary: colors.blue,
      // background: { ...colors.zinc, 75: "#f9f9fa" },
      background: {
        25: "#ffffff",
        50: "#f7f7f7",
        75: "#ededed",
        100: "#e3e3e3",
        150: "#d6d6d6",
        200: "#c8c8c8",
        250: "#b6b6b6",
        300: "#a4a4a4",
        350: "#939393",
        400: "#818181",
        450: "#747474",
        500: "#666666",
        550: "#5c5c5c",
        600: "#515151",
        650: "#4a4a4a",
        700: "#434343",
        750: "#3e3e3e",
        800: "#383838",
        850: "#353535",
        900: "#313131",
        925: "#292929",
        950: "#212121",
        975: "#1c1c1c",
        1000: "#171717",
      },
      black: colors.black,
      white: colors.white,
      gray: colors.gray,
      red: colors.red,
      transparent: colors.transparent,
      current: colors.current,
      inherit: colors.inherit,
  
    },
  },
  plugins: [
    // require("flowbite/plugin"),
    require("@tailwindcss/typography"),
    require("@tailwindcss/forms"),
  ],
};
