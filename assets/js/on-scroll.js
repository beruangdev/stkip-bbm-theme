function throttle(callback, delay) {
  let isThrottled = false;
  let lastArgs = null;

  function wrapper() {
    if (isThrottled) {
      lastArgs = arguments;
      return;
    }

    isThrottled = true;
    callback.apply(null, arguments);

    requestAnimationFrame(function () {
      isThrottled = false;
      if (lastArgs) {
        wrapper.apply(null, lastArgs);
        lastArgs = null;
      }
    });
  }

  return wrapper;
}

window.addEventListener(
  "scroll",
  throttle(function () {
    var scrollY = window.scrollY;
    if (scrollY < 500) changeNavbarBG(scrollY);
  }, 25)
);

function changeNavbarBG(scrollY) {
  const maxScroll = location.pathname === "/" ? 300 : 200;
  const color1 = Math.max((scrollY / maxScroll) * 100, 0);
  const color2 = Math.max((scrollY / maxScroll) * 94 + 6, 6);
  const color3 = Math.max((scrollY / maxScroll) * 70 + 30, 30);
  const nav = document.querySelector("nav.top-navbar");
  if (!nav) return;
  const rgb = "15 20 31"
  nav.style.background = `linear-gradient(0deg, rgb(${rgb} / ${color1}%) 0%, rgb(${rgb} / ${color2}%) 14%, rgb(${rgb} / ${color3}%) 100%)`;
}
