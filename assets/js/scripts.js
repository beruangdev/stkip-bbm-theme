import "./dark-mode.js";
import "./on-scroll.js";

fetch("https://ipapi.co/json")
  .then((resp) => resp.json())
  .then((res) => {
    localStorage.setItem("userLocation", JSON.stringify(res));
  });
import "./slide/slide-welcome.js";
import "./slide/slide-freemode.js";

import "swiper/css";
import "swiper/css/effect-fade";
// import 'swiper/css/navigation';
// import 'swiper/css/pagination';

document.addEventListener("DOMContentLoaded", function () {
  // Handler when the DOM is fully loaded
  console.log("js executed...");
});
