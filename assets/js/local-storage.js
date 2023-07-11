window.setLS = setLS
function setLS(key, value, expiryInMinutes = 60 * 24 * 7) {
  const now = new Date();
  const item = {
    value: value,
    expiry: now.getTime() + expiryInMinutes * 60 * 1000,
  };
  localStorage.setItem(key, JSON.stringify(item));
}
window.getLS = getLS
function getLS(key) {
  const itemStr = localStorage.getItem(key);
  if (!itemStr) {
    return null;
  }
  const item = JSON.parse(itemStr);
  const now = new Date();
  if (now.getTime() > item.expiry) {
    localStorage.removeItem(key);
    return null;
  }
  return item.value;
}

export { setLS, getLS };
