import Swiper from "swiper";

new Swiper(".slide-welcome", {
  spaceBetween: 0,
  centeredSlides: false,
  loop: true,
  effect: "fade",
  fadeEffect: {
    crossFade: true,
  },
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
});
