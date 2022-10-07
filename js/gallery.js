function viewGridPhotos() {
  var articles = document.querySelectorAll(".eachArticle");

  function playWithVisibility() {
    var nthArticleDivTitle = document.querySelectorAll(".nthArticleDivTitle");
    var nthDivAdminPhotos = document.querySelectorAll(".nthDivAdminPhotos");
    var nthGalleryDivPhotos = document.querySelectorAll(".nthGalleryDivPhotos");
    var buttonClose = document.querySelectorAll(".buttonCloseGallery");

    for (let i = 0; i < nthArticleDivTitle.length; i++) {
      nthArticleDivTitle[i].addEventListener("click", function () {
        nthArticleDivTitle[i].classList.add("invisible");
        nthGalleryDivPhotos[i].classList.add("gridVisible");
        nthDivAdminPhotos[i].classList.add("invisible");
        buttonClose[i].classList.remove("invisible");

        buttonClose[i].addEventListener("click", function () {
          nthArticleDivTitle[i].classList.remove("invisible");
          nthGalleryDivPhotos[i].classList.remove("gridVisible");
          nthDivAdminPhotos[i].classList.remove("invisible");
          buttonClose[i].classList.add("invisible");
        });
      });
    }
  }
  articles.forEach(playWithVisibility);
}
viewGridPhotos();
