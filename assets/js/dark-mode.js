var themeToggleBtn = document.querySelector(".theme-toggle");
var themeToggleDarkIcon = document.getElementById("theme-toggle-dark-icon");
var themeToggleLightIcon = document.getElementById("theme-toggle-light-icon");

// Change the icons inside the button based on previous settings
if (
  localStorage.getItem("color-theme") === "dark" ||
  (!("color-theme" in localStorage) &&
    window.matchMedia("(prefers-color-scheme: dark)").matches)
) {
  document.body.classList.add("dark");
   document.documentElement.classList.add('dark')
}

themeToggleBtn.addEventListener("click", function () {
  if (localStorage.getItem("color-theme")) {
    if (localStorage.getItem("color-theme") === "light") {
      document.body.classList.add("dark");
       document.documentElement.classList.add('dark')
      localStorage.setItem("color-theme", "dark");
    } else {
      document.body.classList.remove("dark");
       document.documentElement.classList.remove('dark')
      localStorage.setItem("color-theme", "light");
    }
  } else {
    if (document.body.classList.contains("dark")) {
      document.body.classList.remove("dark");
       document.documentElement.classList.remove('dark')
      localStorage.setItem("color-theme", "light");
    } else {
      document.body.classList.add("dark");
       document.documentElement.classList.add('dark')
      localStorage.setItem("color-theme", "dark");
    }
  }
});
