import "./dark-mode.js";
let selectEl = document.querySelector(`select[id="language"]`);
let datals = localStorage.getItem("fat:language");
if (datals) {
  selectEl.querySelectorAll("option").forEach((op) => {
    if (datals == op.value) {
      op.selected = true;
    }
  });
}else {
  localStorage.setItem("fat:language", "id")
}



import "./on-scroll.js";
import "./helper.js";

import { setLS, getLS } from "./local-storage.js";

if (!getLS("userLocation")) {
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

import "./translate.js";

