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
  }, 25),
);

changeNavbarBG(window.scrollY);
function changeNavbarBG(scrollY) {
  const maxScroll = location.pathname === "/" ? 300 : 200;

  const minPadding = 0.5;
  const maxPadding = 1;
  const padding = Math.max(
    maxPadding - (scrollY / maxScroll) * (maxPadding - minPadding),
    minPadding,
  );

  const color1 = Math.max((scrollY / maxScroll) * 100, 0);
  const color2 = Math.max((scrollY / maxScroll) * 100, 30);
  const color3 = Math.max((scrollY / maxScroll) * 100, 85);
  const color4 = Math.max((scrollY / maxScroll) * 100, 90);

  const nav = document.querySelector("nav.top-navbar");
  if (!nav) return;

  nav.style.paddingTop = `${padding}rem`;
  nav.style.paddingBottom = `${padding}rem`;

  const rgb = "15 20 31";
  nav.style.background = `linear-gradient(0deg, rgb(${rgb} / ${color1}%) 0%, rgb(${rgb} / ${color2}%) 15%, rgb(${rgb} / ${color3}%) 70%, rgb(${rgb} / ${color4}%) 100%)`;
}
