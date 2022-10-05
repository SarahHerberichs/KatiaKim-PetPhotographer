var counter = 0;
let timer, mainDivCarousel, slides, slideWidth, decal;
const diapo = document.querySelector(".diapo");

window.onload = () => {
  //les div contenant les photos
  mainDivCarousel = document.querySelector(".mainDivCarousel");
  console.log(typeof mainDivCarousel);
  //Clone de la 1e image
  let firstImage = mainDivCarousel.firstElementChild.cloneNode(true);
  //ajout de cette image a la collection
  mainDivCarousel.appendChild(firstImage);
  //Créa d'un tableau a partir d'une nodelist
  slides = Array.from(mainDivCarousel.children);
  //les boutons
  let next = document.querySelector("#rightButton");
  let prev = document.querySelector("#leftButton");
  //recup de la largeur d'ecran
  slideWidth = document.body.clientWidth;

  //au click sur chq bouton, lancer evenement
  next.addEventListener("click", slideNext);
  prev.addEventListener("click", slidePrev);
};
function slideNext() {
  //incrémentation du compteur
  counter++;
  mainDivCarousel.style.transition = "1s linear";
  //decalage negatif de largeur de l'écran * compteur
  let decal = -slideWidth * counter;
  //translate de cette valeur (la premiere translation atteint la premiere image, il peut y avoit 3 transition)
  mainDivCarousel.style.transform = `translateX(${decal}px)`;
  //Retour à image initiale si on arrive a la derniere, meme durée de transition
  setTimeout(function () {
    //si on arrive a la derniere translation possible, on repart à zero (translate zero = img 1)
    if (counter >= slides.length - 1) {
      counter = 0;
      mainDivCarousel.style.transition = "unset";
      mainDivCarousel.style.transform = "translateX(0)";
    }
  }, 1000);
}

function slidePrev() {
  //décrémentation du compteur
  counter--;
  mainDivCarousel.style.transition = "1s linear";
  //s'il est inférieur à zero
  if (counter < 0) {
    //si counter = décrémenté arrive à -1, on repart à la derniere img, sans effets
    counter = slides.length - 1;
    mainDivCarousel.style.transition = "unset";
    mainDivCarousel.style.transform = "translateX(0)";
    //rappel de la fonction (pour recuperer la transition lineaire)
    setTimeout(slidePrev, 1);
  }
  //
  let decal = -slideWidth * counter;
  mainDivCarousel.style.transform = `translateX(${decal}px)`;
}
//lancement auto toutes les 4secondes d'un slideNext
timer = setInterval(slideNext, 4000);

//gestion des evenements souris
function stopTimer() {
  clearInterval(timer);
}
function startTimer() {
  timer = setInterval(slideNext, 4000);
}
diapo.addEventListener("mouseover", stopTimer);
diapo.addEventListener("mouseout", startTimer);
