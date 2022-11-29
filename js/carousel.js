/*------------------------------------------------------------------------------------------------------------------------*/
/*---------------------------------------------------------Carousel------------------------------------------------------ */
/*------------------------------------------------------------------- ----------------------------------------------------*/

  //Initialisation counter
  let counter = 0;
  //Variables
  let timer, mainDivCarousel, slides, slideWidth, decal, firstImage;
  //Block contenant le carousel
  const diapo = document.querySelector(".diapo");


  //Toutes les div contenant les photos
  mainDivCarousel = document.querySelector(".mainDivCarousel");
  //Clone de la 1e image
  firstImage = mainDivCarousel.firstElementChild.cloneNode(true);
  //Ajout de cette image a la collection
  mainDivCarousel.appendChild(firstImage);
  //Créa d'un tableau a partir d'une nodelist
  slides = Array.from(mainDivCarousel.children);
  //Boutons
  let next = document.querySelector("#rightButton");
  let prev = document.querySelector("#leftButton");
  //Recup de la largeur d'ecran
  slideWidth = document.body.clientWidth;
  //Mise à jour de la taille de l'écran si resize
  window.addEventListener('resize', function(){
    slideWidth= document.body.clientWidth
    });
    
  //LANCEMENT DES ANIMATIONS AU CLICK
  next.addEventListener("click", slideNext);
  prev.addEventListener("click", slidePrev);


/*--------------------------------------------------------------------*/
/*------------------------------Fonctions---------------------------- */
/*--------------------------------------------------------------------*/

  function slideNext() {
    //Incrémentation du compteur
    counter++;
    //Style appliqué
    mainDivCarousel.style.transition = "1s linear";
    //Decalage negatif de largeur de l'écran * compteur
    let decal = -slideWidth * counter;
    //Translate de cette valeur (la premiere translation atteint la premiere image, il peut y avoir 3 transition)
    mainDivCarousel.style.transform = `translateX(${decal}px)`;
    //Retour à image initiale si on arrive a la derniere, meme durée de transition
    setTimeout(function () {
      //si on arrive a la derniere translation possible, on repart à zero (translate zero = img 1)
      if (counter >= slides.length - 1) {
        counter = 0;
        //Annulation de la transition (car appliqué au setTimeOut)
        mainDivCarousel.style.transition = "unset";
        //translate à zero
        mainDivCarousel.style.transform = "translateX(0)";
      }
    }, 1000);
  }

  function slidePrev() {
    //décrémentation du compteur
    counter--;
    mainDivCarousel.style.transition = "1s linear";
    //si on arrive à la premiere image
    if (counter < 0) {
      //on repart à la derniere img
      counter = slides.length - 1;
      mainDivCarousel.style.transition = "unset";
      mainDivCarousel.style.transform = "translateX(0)";
      //rappel de la fonction (pour recuperer la transition linéaire)
      setTimeout(slidePrev, 1);
    }
    // décalage
    let decal = -slideWidth * counter;
    mainDivCarousel.style.transform = `translateX(${decal}px)`;
  }
  
  //timer  : toutes les 4secondes lancement d'un slideNext
  timer = setInterval(slideNext, 4000);

/*------------------------------------------------------------------------*/
/*--------------------------Evenements Souris-----------------------------*/
/*------------------------------------------------------------------------*/
  function stopTimer() {
    clearInterval(timer);
  }
  function startTimer() {
    timer = setInterval(slideNext, 4000);
  }
  diapo.addEventListener("mouseover", stopTimer);
  diapo.addEventListener("mouseout", startTimer);




