function mobileNavAnimation() {
  //dropDown englobe le boutton et la div contenant les liens
  var dropDown = document.querySelectorAll(".dropdown");
  var navBar = document.querySelector(".nav");
  var icon = document.querySelector(".iconBurger");

  icon.addEventListener("click", function () {
    navBar.classList.toggle("burgerClicked");
    for (let i = 0; i < 4; i++) {
      if (window.innerWidth < 880) {
        dropDown[i].addEventListener("click", function () {
          dropDown[i].classList.toggle("heightProgress");
        });
        if (!navBar.classList.contains("burgerClicked")) {
          dropDown[i].classList.remove("heightProgress");
        }
      }
    }
  });
}
mobileNavAnimation();

/* Gestion Caroussel */

var counter = 0;
var timer;
var elements;
var slides;
var slideWidth;

window.onload = () => {
  var diapo = document.querySelector(".diapo");
  var next = document.querySelector(".next");

  elements = document.querySelector(".elements");

  //récup de la premiere image
  let firstImage = elements.firstElementChild.cloneNode(true);
  // injection de cette image a la fin du diapo
  elements.appendChild(firstImage);

  slides = Array.from(elements.children);
  //recup de la largeur d'une slide
  slideWidth = diapo.getBoundingClientRect().width;

  next.addEventListener("click", slideNext);
};
function slideNext() {
  counter++;
  elements.style.transition = "1s linear";
  var decal = -slideWidth * counter;
  elements.style.transform = `translateX(${decal}px)`;
  setTimeout(function () {
    if (counter <= slides.length - 1) {
      counter = 0;
      elements.style.transition = "unset";
      elements.style.transform = "translateX(0)";
    }
  }, 1000);
}
