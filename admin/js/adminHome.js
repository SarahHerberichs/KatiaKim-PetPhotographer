/*------------------------------------------------------------------- ----------------------------------------------------*/
/*-----------------------------------------------Gestion messages Contact------------------------------------------------ */
/*------------------------------------------------------------------- ----------------------------------------------------*/

/*Déclaration variables*/

//Bouton submit pour add un comment
let commentButton = document.getElementsByName("commentSubmit");
//Div pour affichage du comment
let newCommentDiv = document.getElementsByName("newCommentDiv");
//Textarea pour submit un comment
let comment = document.getElementsByName("comment");
//Bouton modifier comment
let reEditButton = document.getElementsByName("reEditButton");

var markAsReadButton = document.getElementsByClassName("markAsRead");
//Toutes les box msg
let mainDivMobilesBoxes = document.getElementsByClassName("mainDivMobileBoxes");
//Tous les span contenant l'id du message
let idMobileBox = document.getElementsByClassName("idMobileBox");
//Tableau pour stocker messages "lus"
let arrayReadMessages = [];
let eachBox = mainDivMobilesBoxes[0].children;

/*--------------------------------------------------------------------------------------*/
/*--------------------------Visibilité dans la gestion des commentaires-----------------*/
/*--------------------------------------------------------------------------------------*/

for (let i = 0; i < comment.length; i++) {
  //si la div contenant le comment n'est pas vide
  if (newCommentDiv[i].textContent !== "") {
    //text area invisible
    comment[i].classList.add("invisible");
    //boutton valider invisible
    commentButton[i].classList.add("invisible");
    //boutton modifier visible
    reEditButton[i].classList.remove("invisible");
  }
  //SINON
  // au click sur modifier
  reEditButton[i].addEventListener("click", function () {
    reEditButton[i].classList.add("invisible");
    //reEditArea visible
    comment[i].classList.remove("invisible");
    //button valider visible
    commentButton[i].classList.remove("invisible");
  });
}

/*---------------------------------------------------------------------------------------*/
/*--------------------------- Gestion de l'opacité des messages lus ---------------------*/
/*---------------------------------------------------------------------------------------*/

//Si local storage est vide, l'initialiser comme tableau vide
if (JSON.parse(localStorage.getItem("readMessages") === null)) {
  localStorage.setItem("readMessages", JSON.stringify([]));
}
// Recuperation du local storage et application d'un style sur elements trouvés
function retreiveAndStyleMsg() {
  readMessagesStored = JSON.parse(localStorage.getItem("readMessages"));
  arrayReadMessages = readMessagesStored;
  //incrémentation y de la longueur du nb de boxes
  for (let y = 0; y < idMobileBox.length; y++) {
    //Si dans le local storage il y a une valeur = l'id d'un msg parcourru, style a la box correspondante
    if (readMessagesStored.includes(idMobileBox[y].textContent)) {
      eachBox[y].style.opacity = "0.5";
    }
  }
}

//Style immédiat au click + insertion de l'id dans le local storage + rappel de la function retreiveStyleMsg
function opacityMessages() {
  //incrémentation y de la longueur du nb de boxes
  for (let i = 0; i < eachBox.length; i++) {
    //au click sur markAsRead parcourru,
    markAsReadButton[i].addEventListener("click", function () {
      //style immédiat sur la box correspondante
      eachBox[i].style.opacity = "0.5";
      //push dans tableau l'id de la box
      arrayReadMessages.push(idMobileBox[i].textContent);
      //et push dans le local storage ce tableau (en string)
      localStorage.setItem("readMessages", JSON.stringify(arrayReadMessages));
    });
  }
  //get localStorage, si une des boites à un id correspondant, style appliqué
  retreiveAndStyleMsg();
}
// APPEL DES DEUX FONCTIONS
opacityMessages();
