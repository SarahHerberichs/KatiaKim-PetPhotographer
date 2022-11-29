/*-----------------------------------------------------------------------------------------------------------------------*/
/*-----------------------------------------------ANIMATIONS BORDER BOTTOM TITRES---------------------------------------- */
/*-----------------------------------------------------------------------------------------------------------------------*/
// ELEMENTS A ANIMER
let eltWithScrollAnim = document.getElementsByClassName(
  "eltWithScrollAnimation"
);
//HAUTEUR ECRAN
let height = window.innerHeight;

for (let i = 0; i < eltWithScrollAnim.length; i++) {
  let heightObject = eltWithScrollAnim[i].offsetHeight;
  let eltPosition = eltWithScrollAnim[i].offsetTop;

  window.addEventListener("scroll", function () {
    let scrollPosition = window.scrollY;
    //SI L'ELEMENT ENTRE DANS CHAMP DE VISION, AJOUT OU SUPRESSION D'ANIMATION
    if (scrollPosition < eltPosition + heightObject - height) {
      eltWithScrollAnim[i].classList.remove("eltWithScrollAnimationVisible");
    }
    if (scrollPosition > eltPosition + heightObject - height) {
      eltWithScrollAnim[i].classList.add("eltWithScrollAnimationVisible");
    }
  });
}
