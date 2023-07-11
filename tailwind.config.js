const colors = require("tailwindcss/colors");
/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: "class",
  content: [
    // https://tailwindcss.com/docs/content-configuration
    "./*.php",
    "./inc/**/*.php",
    "./templates/**/*.php",
    "./template-parts/**/*.php",
    "./safelist.txt",
    //'./**/*.php', // recursive search for *.php (be aware on every file change it will go even through /node_modules which can be slow, read doc)
    "./node_modules/flowbite/**/*.js",
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
      background: { ...colors.zinc, 75: "#f9f9fa" },
      // background: {
      //   50: "#f7f7f7",
      //   75: "#f6f4f4",
      //   100: "#e3e3e3",
      //   200: "#c8c8c8",
      //   300: "#a4a4a4",
      //   400: "#6e6e6e",
      //   500: "#595959",
      //   600: "#3d3d3d",
      //   700: "#2e2e2e",
      //   800: "#212121",
      //   900: "#121212",
      //   950: "#050505",
      // },
    },
  },
  plugins: [
    require("flowbite/plugin"),
    require("@tailwindcss/typography"),
    require("@tailwindcss/forms"),
  ],
};
