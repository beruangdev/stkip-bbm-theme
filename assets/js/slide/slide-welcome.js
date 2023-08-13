import Swiper from "swiper";
import { EffectFade, Autoplay } from "swiper/modules";

new Swiper(".slide-welcome", {
  modules: [EffectFade, Autoplay],
  spaceBetween: 0,
  centeredSlides: false,
  effect: "fade",
  loop: true,
  fadeEffect: {
    crossFade: true,
  },
  // autoplay: {
  //   delay: 2000,
  //   disableOnInteraction: false,
  // },
});
