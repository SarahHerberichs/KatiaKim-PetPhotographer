/*-----------------------------------------------------------------------------------------------------------------------*/
/*--------------------------------------------OUVERTURE FERMETURE D'ARTICLE--------------------------------------------- */
/*-----------------------------------------------------------------------------------------------------------------------*/

function viewGridPhotos() {
  let articles = document.querySelectorAll(".eachArticle");

  function playWithVisibility() {
    let nthArticleDivTitle = document.querySelectorAll(".nthArticleDivTitle");
    let nthDivAdminPhotos = document.querySelectorAll(".nthDivAdminPhotos");
    let nthArticleDivPhotos = document.querySelectorAll(".nthArticleDivPhotos");
    let buttonClose = document.querySelectorAll(".buttonCloseGallery");
    let chevronTop = document.querySelector(".chevronUp")

    for (let i = 0; i < nthArticleDivTitle.length; i++) {
      
      nthArticleDivTitle[i].addEventListener("click", function () {
        nthArticleDivTitle[i].classList.add("invisible");
        nthArticleDivPhotos[i].classList.add("gridVisible");
        nthDivAdminPhotos[i].classList.add("invisible");
        buttonClose[i].classList.remove("invisible");
      });
      
      buttonClose[i].addEventListener("click", function () {
        nthArticleDivTitle[i].classList.remove("invisible");
        nthArticleDivPhotos[i].classList.remove("gridVisible");
        nthDivAdminPhotos[i].classList.remove("invisible");
        buttonClose[i].classList.add("invisible");
      });          
      chevronTop.addEventListener("click", function () {
        nthArticleDivTitle[i].classList.remove("invisible");
        nthArticleDivPhotos[i].classList.remove("gridVisible");
        nthDivAdminPhotos[i].classList.remove("invisible");
        buttonClose[i].classList.add("invisible");
      });
    }
  }
  articles.forEach(playWithVisibility);
}
viewGridPhotos();

