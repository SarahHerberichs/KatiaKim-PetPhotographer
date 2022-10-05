//Bouton submit pour add un comment
var commentButton = document.getElementsByName("commentSubmit");
//Div pour affichage du comment
var newCommentDiv = document.getElementsByName("newCommentDiv");
//textarea pour submit un comment
var comment = document.getElementsByName("comment");
//bouton modifier comment
var reEditButton = document.getElementsByName("reEditButton");

var markAsReadButton = document.getElementsByClassName("markAsRead");

var mainDivMobilesBoxes = document.getElementsByClassName("mainDivMobileBoxes");

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
  var arrayReadMessages = [];
  for (let i = 0; i < mainDivMobilesBoxes[0].children.length; i++) {
    markAsReadButton[i].addEventListener("click", function () {
      //application d'un style immédiat au message lu et insertion dans tableau
      mainDivMobilesBoxes[0].children[i].style.opacity = "0.5";
      arrayReadMessages.push(i);
      //insertion du tableau dans local storage
      localStorage.setItem("elementToStore", JSON.stringify(arrayReadMessages));
    });
  }
}
opacityMessages();
var retreiveReadMessages = JSON.parse(localStorage.getItem("elementToStore"));
//parcours du tableau et application du style aux messagesBoxes dont l'index a été défini comme lu
for (let y = 0; y < retreiveReadMessages.length; y++) {
  mainDivMobilesBoxes[0].children[retreiveReadMessages[y]].style.opacity =
    "0.5";
}
