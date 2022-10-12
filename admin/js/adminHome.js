//Bouton submit pour add un comment
var commentButton = document.getElementsByName("commentSubmit");
//Div pour affichage du comment
var newCommentDiv = document.getElementsByName("newCommentDiv");
//textarea pour submit un comment
var comment = document.getElementsByName("comment");
//bouton modifier comment
var reEditButton = document.getElementsByName("reEditButton");

var markAsReadButton = document.getElementsByClassName("markAsRead");
//toutes les box msg
var mainDivMobilesBoxes = document.getElementsByClassName("mainDivMobileBoxes");
//tous les span contenant l'id du message
var idMobileBox = document.getElementsByClassName("idMobileBox");
//tableau pour stocker messages "lus"
var arrayReadMessages = [];
var eachBox = mainDivMobilesBoxes[0].children;

/*-----------Gestion visibilité dans la gestion des commentaires---------*/

for (let i = 0; i < comment.length; i++) {
  //si la div contenant le comment n'est pas vide
  if (newCommentDiv[i].textContent !== "") {
    //text area invisible
    comment[i].classList.add("invisible");
    //boutton valider invisible
    commentButton[i].classList.add("invisible");
    //bouton modifier visible
    reEditButton[i].classList.remove("invisible");
  }
  //SINON
  // au click sur modifier
  reEditButton[i].addEventListener("click", function () {
    //reEditArea visible
    reEditButton[i].classList.add("invisible");
    comment[i].classList.remove("invisible");
    //button valider visible
    commentButton[i].classList.remove("invisible");
    console.log(reEditButton[i]);
  });
}
/*----------- Gestion de l'opacité des messages lus -----------*/

function opacityMessages() {
  for (let i = 0; i < eachBox.length; i++) {
    //au click sur un des boutons, ajout style
    markAsReadButton[i].addEventListener("click", function () {
      eachBox[i].style.opacity = "0.5";
      //l'id est stocké dans tableau
      arrayReadMessages.push(idMobileBox[i].textContent);
      console.log(arrayReadMessages);
      console.log(idMobileBox[i].textContent);
    });
  }
  //insertion du tableau contenant les id des box "lues"
  localStorage.setItem("readMessages", JSON.stringify(arrayReadMessages));
}
opacityMessages();

//recup du local storage (tableau: id des elements lus), si dans ce tableau ET dans le tableau idMobileBox il y a les mm valeurs,
//retrouver la mobileBox associée et lui appliquer style. (idMobileBox[i] --> eachBox[i] correspondant)
var readMessagesStored = JSON.parse(localStorage.getItem("readMessages"));
//parcours ce tableau
for (let y = 0; y < readMessagesStored.length; y++) {
  // et parcours chaque box
  for (let z = 0; z < eachBox.length; z++) {
    //si un index du tableau stocké dans localStorage = un des ids --->mainDivMobilseBoxes[z] (longueur = a celle des id donc ok)

    if (readMessagesStored[y] === idMobileBox[z].innerText) {
      eachBox[z].style.opacity = "0.5";
      console.log(readMessagesStored[y]);
      console.log(idMobileBox[z]);
    }
  }
}
