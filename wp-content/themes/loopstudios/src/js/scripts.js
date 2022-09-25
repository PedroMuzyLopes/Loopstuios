let oppened_menu = false;

function disableScroll() {
  scrollTop = window.pageYOffset || document.documentElement.scrollTop;
  (scrollLeft = window.pageXOffset || document.documentElement.scrollLeft),
    (window.onscroll = function () {
      window.scrollTo(scrollLeft, scrollTop);
    });
}

function enableScroll() {
  window.onscroll = function () {};
}

window.addEventListener("DOMContentLoaded", () => {
  let hamburger_button = document.getElementById("mobile-menu-icon");
  let menu_list = document.querySelector(".menu-header-menu-container");
  let header = document.getElementsByTagName("header");
  let board_message = document.getElementById("board-message");
  console.log(hamburger_button.attributes.base_dir.value);
  let base_path = hamburger_button.attributes.base_dir.value;

  if (hamburger_button) {
    hamburger_button.addEventListener("click", () => {
      board_message.classList.toggle("hidden");
      hamburger_button.childNodes[1].src = `${base_path}/src/icons/${
        oppened_menu ? "icon-hamburger" : "icon-close"
      }.svg`;
      header[0].classList.toggle("mobile-menu");
      document.querySelector(".menu").classList.toggle("col");
      menu_list.classList.toggle("active");
      oppened_menu = !oppened_menu;

      if (oppened_menu) {
        disableScroll();
      } else {
        enableScroll();
      }
    });
  }
});
