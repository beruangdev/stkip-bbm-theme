import Swiper from "swiper";
import destr from "destr";
const elements = document.querySelectorAll(".swiper.freemode");
if (elements.length) {
  for (let index = 0; index < elements.length; index++) {
    const element = elements[index];
    const breakpoints = destr(element.getAttribute("data-breakpoints"));
    console.log(
      "🚀 ~ file: slide-freemode.js:8 ~ breakpoints:",
      typeof breakpoints
    );
    console.log("🚀 ~ file: slide-freemode.js:8 ~ breakpoints:", breakpoints);
    new Swiper(".swiper.freemode", {
      slidesPerView: element.getAttribute("data-slides-per-view") ?? 3,
      centeredSlides: false,
      spaceBetween: element.getAttribute("data-space-between") ?? 30,
      grabCursor: true,
      breakpoints: typeof breakpoints === "object" ? breakpoints : null,
    });
  }
}
