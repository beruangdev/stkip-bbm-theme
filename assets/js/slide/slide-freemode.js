import Swiper from "swiper";
import { FreeMode } from 'swiper/modules';
import destr from "destr";
const elements = document.querySelectorAll(".swiper.freemode");
if (elements.length) {
  for (let index = 0; index < elements.length; index++) {
    const element = elements[index];
    const breakpoints = destr(element.getAttribute("data-breakpoints"));
    new Swiper(".swiper.freemode", {
      modules: [FreeMode],
      slidesPerView: element.getAttribute("data-slides-per-view") ?? 3,
      centeredSlides: false,
      spaceBetween: element.getAttribute("data-space-between") ?? 10,
      grabCursor: true,
      breakpoints: typeof breakpoints === "object" ? breakpoints : null,
      freeMode: {
        enabled: true,
        sticky: false,
      },
    });
  }
}
