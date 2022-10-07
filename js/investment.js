// Evenement au scroll
let eltWithScrollAnim = document.getElementsByClassName(
  "eltWithScrollAnimation"
);
console.log(eltWithScrollAnim.length);
for (let i = 0; i < eltWithScrollAnim.length; i++) {
  //hauteur écran
  let height = window.innerHeight;
  console.log("hauter d'ecran : " + height);
  //au scroll , si la position fenetre est supérieure a position de l'élément - 1/2 écran
  // ET inférieure a position de l'élément + 1/2 écran
  window.addEventListener("scroll", function () {
    if (
      window.scrollY > eltWithScrollAnim[i].offsetTop - height / 2 &&
      window.scrollY < eltWithScrollAnim[i].offsetTop + height / 2
    ) {
      eltWithScrollAnim[i].classList.add = "eltWithScrollAnimationVisible";
      console.log(eltWithScrollAnim[i]);
    }
    console.log(window.scrollY);
  });
}
