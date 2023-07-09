import Swiper from "swiper";
import { EffectFade } from "swiper/modules";

new Swiper(".slide-welcome", {
  modules: [EffectFade],
  spaceBetween: 0,
  centeredSlides: false,
  effect: "fade",
  loop: true,
  fadeEffect: {
    crossFade: true,
  },
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
});
