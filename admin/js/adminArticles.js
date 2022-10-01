var addArticleButton = document.querySelector(".addArticleButton");
var addArticleDiv = document.querySelector(".addArticleDiv");
var closeAddArticleButton = document.querySelector(".closeAddArticleButton");
var tableAdmin = document.querySelector(".tableAdmin");

var closePhotosButton = document.querySelector(".closePhotosButton");
var viewPhotosButton = document.querySelector(".viewPhotosButton");

var viewArticlesImages = document.querySelector(".viewArticlesImages");

var success = document.querySelector(".success");
var error = document.querySelector(".errorMessage");

addArticleButton.addEventListener("click", function () {
  addArticleDiv.classList.remove("invisible");
  tableAdmin.classList.add("invisible");
  // addArticleDiv.classList.add("animForm");
});
closeAddArticleButton.addEventListener("click", function () {
  addArticleDiv.classList.add("invisible");
  tableAdmin.classList.remove("invisible");
});

viewPhotosButton.addEventListener("click", function () {
  viewArticlesImages.classList.remove("invisible");
  tableAdmin.classList.add("invisible");
});
closePhotosButton.addEventListener("click", function () {
  viewArticlesImages.classList.add("invisible");
  tableAdmin.classList.remove("invisible");
});
