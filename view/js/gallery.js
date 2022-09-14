function viewGridPhotos() {
  var nthGalleryDivTitle = document.querySelector(".nthGalleryDivTitle");
  var gridDiv = document.querySelector(".gridDiv");
  var buttonClassGallery = document.querySelector(".buttonCloseGallery");
  nthGalleryDivTitle.addEventListener("click", function () {
    nthGalleryDivTitle.classList.add("invisible");
    gridDiv.classList.add("gridVisible");
    buttonClassGallery.classList.remove("invisible");
  });
  buttonClassGallery.addEventListener("click", function () {
    gridDiv.classList.remove("gridVisible");
    nthGalleryDivTitle.classList.remove("invisible");
  });
}
viewGridPhotos();
