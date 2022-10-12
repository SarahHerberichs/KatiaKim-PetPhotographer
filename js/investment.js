// Evenement au scroll
let eltWithScrollAnim = document.getElementsByClassName(
  "eltWithScrollAnimation"
);
let height = window.innerHeight;

for (let i = 0; i < eltWithScrollAnim.length; i++) {
  let heightObject = eltWithScrollAnim[i].offsetHeight;
  let eltPosition = eltWithScrollAnim[i].offsetTop;
  // ET inférieure a position de l'élément + 1/2 écran
  window.addEventListener("scroll", function () {
    let scrollPosition = window.scrollY;
    //initialisation, si au dessus de l'élement a animer, supprimer animation
    if (scrollPosition < eltPosition + heightObject - height) {
      eltWithScrollAnim[i].classList.remove("eltWithScrollAnimationVisible");
    }
    //si arrivée dans zone de l'élement, ajouter animation
    if (scrollPosition > eltPosition + heightObject - height) {
      eltWithScrollAnim[i].classList.add("eltWithScrollAnimationVisible");
    }
  });
}
