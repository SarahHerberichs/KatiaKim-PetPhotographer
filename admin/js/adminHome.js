//Bouton submit pour add un comment
var commentButton = document.getElementsByName("commentSubmit");
//Div pour affichage du comment
var newCommentDiv = document.getElementsByName("newCommentDiv");
//textarea pour submit un comment
var comment = document.getElementsByName("comment");
//bouton modifier comment
var reEditButton = document.getElementsByName("reEditButton");

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
