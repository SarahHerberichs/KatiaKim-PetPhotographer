let adminLogOutButton = document.querySelector(".adminLogOut");

/*-----------------------------------------------------------------------------------------------------------------*/
/*-------------------------------------------------MENU DEROULANT--------------------------------------------------*/
/*-----------------------------------------------------------------------------------------------------------------*/

//Déclaration Variables

let dropDown = document.querySelectorAll(".dropdown");
let navBar = document.querySelector(".nav");
let iconBurger = document.querySelector(".iconBurger");
let iconClose = document.querySelector(".iconClose");
let linkDiv = document.querySelectorAll(".linkDiv a");

// Fonctions
function openMenuBurger() {
  iconBurger.classList.remove("visible");
  iconBurger.classList.add("invisible");
  iconClose.classList.remove("invisible");
  iconClose.classList.add("visible");
  navBar.classList.add("burgerClicked");

  for (let i = 0; i < 4; i++) {
    dropDown[i].addEventListener("click", function () {
      dropDown[i].classList.toggle("heightProgress");
    });
  }
}
function closeMenuBurger() {
  window.location.reload();
}

//Au click sur Open/Close
iconBurger.addEventListener("click", function () {
  openMenuBurger();
});

iconClose.addEventListener("click", function () {
  closeMenuBurger();
});

/*------------------------------------------------------------------------------------------------------------------------*/
/*-----------------------------------------------------ACCESSIBILITY------------------------------------------------------*/
/*------------------------------------------------------------------------------------------------------------------------*/

//Déclaration Variables

let toggleButtonVis = document.querySelector(".toggleVis");
let toggleTextVis = document.querySelector(".toggleTextVis");
let main = document.getElementsByTagName("main");
let articles = document.getElementsByTagName("article");

/*------------------------------------------------------------------------*/
/*----------------------------FONCTIONS - STYLES--------------------------*/
/*------------------------------------------------------------------------*/

//1-MALVOYANTS -STYLE
function modeVisibility() {
  toggleButtonDys.style.pointerEvents = "none";
  toggleTextVis.innerText = "ON";
  main[0].classList.add("accessibility-vision");
  navBar.style.fontSize = "2em";
  for (let i = 0; i < articles.length; i++) {
    articles[i].style.padding = "0";
  }
  for (let y = 0; y < linkDiv.length; y++) {
    linkDiv[y].style.border = "3px solid red";
    linkDiv[y].style.background = " black ";
    linkDiv[y].style.color = "white";
    linkDiv[y].style.borderRadius = "10px";
    if (screen.width > 880) {
      linkDiv[y].style.marginLeft = "2em";
    }
  }
}
//2-DYSLEXIE - STYLE
function modeDyslexie() {
  toggleButtonVis.style.pointerEvents = "none";
  toggleTextDys.innerText = "ON";
  main[0].classList.add("accessibility-dys");
}

/*--------------------------------------------------------------------------*/
/*------FONCTIONS ONCLICK+ ONFOCUS Appel Fonctions + SessionStorage)--------*/
/*--------------------------------------------------------------------------*/

//1-MALVOYANTS

//Pistes audio
let visSound = new Audio("admin/files/lowVisionMode.mp3")
let dysSound = new Audio("admin/files/dyslexiaMode.mp3")


function toggleAnimationVis() {
  toggleButtonVis.classList.toggle("active");

  if (toggleButtonVis.classList.contains("active")) {           
    sessionStorage.setItem("visActive", "1");
    sessionStorage.setItem("dysActive", "0");
    modeVisibility();
  } else {
    sessionStorage.setItem("visActive", "0");
    window.location.reload();
  }
}
function visFocus() {
    visSound.play()
}

//2-DYSLEXIE

//Audio
let toggleButtonDys = document.querySelector(".toggleDys");
let toggleTextDys = document.querySelector(".toggleTextDys");

function toggleAnimationDys() {
  toggleButtonDys.classList.toggle("active");

  if (toggleButtonDys.classList.contains("active")) {
    sessionStorage.setItem("dysActive", "1");
    sessionStorage.setItem("visActive", "0");
    modeDyslexie();
  } else {
    window.location.reload();
    sessionStorage.setItem("dysActive", "0");
  }
}
function dysFocus() {
  dysSound.play()
}

/*--------------------------------------------------------------------------*/
/*--------------------------MODE SELON CHOIX STOCKé-------------------------*/
/*--------------------------------------------------------------------------*/

let visStatuts = sessionStorage.getItem("visActive");
let dysStatuts = sessionStorage.getItem("dysActive");

function visibilityScreen() {
  if (visStatuts === "1") {
    toggleButtonVis.classList.add("active");
    modeVisibility();
  } else {
    toggleButtonVis.classList.remove("active");
  }
  if (dysStatuts === "1") {
    toggleButtonDys.classList.add("active");
    modeDyslexie();
  } else {
    toggleButtonDys.classList.remove("active");
  }
}

visibilityScreen();


