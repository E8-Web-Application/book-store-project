
// Dark Mode Start
const darkMode=document.getElementById("dark-mode");
const body = document.querySelector('body');

// Check for the saved value of dark mode in localStorage
const isDarkModeEnabled = localStorage.getItem('darkMode') === 'true';

// Apply the dark mode styles if the saved value is true
if (isDarkModeEnabled) {
  body.classList.add('body-dark-mode');
  document.querySelector('#dark-mode i').classList.add('fa-toggle-on');
}

// Add an event listener to the dark mode toggle button
darkMode.addEventListener("click", () => {
  // Toggle the dark mode class on the body element
  body.classList.toggle('body-dark-mode');

  // Toggle the toggle button icon
  document.querySelector('#dark-mode i').classList.toggle('fa-toggle-on');

  // Save the current state of the dark mode in localStorage
  localStorage.setItem('darkMode', body.classList.contains('body-dark-mode'));
});
// Dark Mode End

// Toggle button animation start
const menu = document.querySelector(".menu");
const line1 = document.querySelector(".line1");
const line2 = document.querySelector(".line2");
const line3 = document.querySelector(".line3");
const navbarMobile = document.querySelector(".navbar-mobile");
menu.addEventListener("click", () => {
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



