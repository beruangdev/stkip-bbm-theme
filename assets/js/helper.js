import { getLS } from "./local-storage";

window.humanReadableTime = humanReadableTime
function humanReadableTime(dateString) {
  const formatter = new Intl.RelativeTimeFormat(getPreferredLanguage(), {
    numeric: "auto",
    style: "long",
    localeMatcher: "best fit",
  });

  const olderDate = new Date(dateString);
  const currentDate = new Date();
  const diff = olderDate - currentDate;

  let timeUnit = "second";
  let time = 0;
  const minutes = Math.floor(diff / 1000 / 60);
  const hours = Math.floor(minutes / 60);
  const days = Math.floor(hours / 24);
  const weeks = Math.floor(days / 7);
  const months = Math.floor(days / 30);
  const years = Math.floor(days / 365);

  if (years < 1) {
    timeUnit = "year";
    time = years;
  } else if (months < 1) {
    timeUnit = "month";
    time = months;
  } else if (weeks < 1) {
    timeUnit = "week";
    time = weeks;
  } else if (days < 1) {
    timeUnit = "day";
    time = days;
  } else if (hours < 1) {
    timeUnit = "hour";
    time = hours;
  } else if (minutes < 1) {
    timeUnit = "minute";
    time = minutes;
  } else {
    timeUnit = "second";
    time = diff;
  }
  time++;
  if (typeof time === "number" && !isNaN(time)) {
    return formatter.format(time, timeUnit);
  }
  return "0000";
}


async function getPreferredLanguage() {
  let userLanguage = getLS("userLocation");
  if (userLanguage) {
    userLanguage = userLanguage?.country || userLanguage?.country_code;
  } else {
    userLanguage = navigator.language || navigator.userLanguage;
  }
  return userLanguage;
}
