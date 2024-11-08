const main = document.querySelector("#main");
const headerSwitch = document.querySelector(".header-switch");

headerSwitch.addEventListener("click", function () {
  main.classList.toggle("dark-theme");
});
