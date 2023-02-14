// Toggle button animation start
const menu = document.querySelector(".menu");
const line1 = document.querySelector(".line1");
const line2 = document.querySelector(".line2");
const line3 = document.querySelector(".line3");
const navbarMobile = document.querySelector(".navbar-mobile");
menu.addEventListener("click", () => {
  console.log("nice");
  setTimeout(() => {
    line1.classList.toggle("line1-active");
    line2.classList.toggle("line2-active");
    line3.classList.toggle("line3-active");
  }, 500);
  menu.classList.toggle("menu-active");
  navbarMobile.classList.toggle("navbar-mobile-active");
});

window.addEventListener("resize", () => {
  setTimeout(() => {
    line1.classList.remove("line1-active");
    line2.classList.remove("line2-active");
    line3.classList.remove("line3-active");
  }, 500);
  menu.classList.remove("menu-active");
  navbarMobile.classList.remove("navbar-mobile-active");
});
// Toggle button animation end

// Start add to cart

document.querySelector(".btn-add-to-cart").addEventListener("click", () => {
  alert("Hello world!");
});
