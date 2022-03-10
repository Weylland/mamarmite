const navDropdown = document.getElementById("navDropdown");
const navDropdownList = document.getElementById("navDropdownList");
//MEBU BURGER
const burgerMenu = document.getElementById("burgerMenu");
const burgerMenuI = document.getElementById("burgerMenuI");
const nav = document.getElementById("nav");

navDropdown.addEventListener("click", () => {
  if (navDropdownList.className.indexOf("hide") > -1) {
    navDropdownList.classList.remove("hide");
    navDropdownList.classList.add("show");
  } else if (navDropdownList.className.indexOf("hide") == -1) {
    navDropdownList.classList.remove("show");
    navDropdownList.classList.add("hide");
  }
});

// MENNU BURGER ANIMATION

burgerMenuI.classList.add("fa-bars");

window.addEventListener("resize", () => {
  if (
    window.innerWidth < 1000 &&
    nav.className.indexOf("smallNavHidden") == -1
  ) {
    burgerMenuI.classList.remove("fa-times");
    burgerMenuI.classList.add("fa-bars");
  } else if (
    window.innerWidth >= 1000 &&
    nav.className.indexOf("smallNavHidden") > -1
  ) {
    burgerMenuI.classList.remove("fa-times");
    burgerMenuI.classList.add("fa-bars");
    nav.classList.remove("smallNavHidden");
  }
});
burgerMenu.addEventListener("click", () => {
  if (nav.className.indexOf("smallNavHidden") > -1) {
    burgerMenuI.classList.remove("fa-bars");
    burgerMenuI.classList.add("fa-times");

    nav.classList.remove("smallNavHidden");
    nav.classList.add("smallNavShow");
  } else {
    burgerMenuI.classList.remove("fa-times");
    burgerMenuI.classList.add("fa-bars");

    nav.classList.remove("smallNavShow");
    nav.classList.add("smallNavHidden");
  }
});
