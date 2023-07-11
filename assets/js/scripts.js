import "./dark-mode.js";
import "./on-scroll.js";
import "./helper.js";

import {
  setLS,
  getLS,
} from "./local-storage.js";

if (!getLS("userLocation")) {
  console.log('GET USER LOCATION FROM API')
  // fetch("https://ipapi.co/json")
  fetch("https://ipinfo.io/json?token=575b3e988f8efc")
    .then((resp) => resp.json())
    .then((res) => {
      setLS("userLocation", res, 60 * 24 * 7 * 2);
    });
}

import "./slide/slide-welcome.js";

import "./alpine/fetch-child.js";

import "./slide/slide-freemode.js";

// import "./alpine/section-bio.js";

import "swiper/css";
import "swiper/css/effect-fade";
// import 'swiper/css/navigation';
// import 'swiper/css/pagination';

document.addEventListener("DOMContentLoaded", function () {
  // Handler when the DOM is fully loaded
  console.log("js executed...");
});
