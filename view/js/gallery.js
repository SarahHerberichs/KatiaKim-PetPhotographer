function viewGridPhotos() {
  var nthGalleryDivTitle = document.querySelectorAll(".nthGalleryDivTitle");
  var gridDiv = document.querySelectorAll(".gridDiv");
  var buttonClassGallery = document.querySelectorAll(".buttonCloseGallery");

  console.log(nthGalleryDivTitle[1]);
  for (let i = 0; i < nthGalleryDivTitle.length; i++) {
    nthGalleryDivTitle[i].addEventListener("click", function () {
      nthGalleryDivTitle[i].classList.add("invisible");
      gridDiv[i].classList.add("gridVisible");
      buttonClassGallery[i].classList.remove("invisible");
    });
    buttonClassGallery[i].addEventListener("click", function () {
      gridDiv[i].classList.remove("gridVisible");
      nthGalleryDivTitle[i].classList.remove("invisible");
    });
  }
}
viewGridPhotos();
