var addArticleButton = document.querySelector(".addArticleButton");
var addArticleDiv = document.querySelector(".addArticleDiv");
var closeAddArticleButton = document.querySelector(".closeAddArticleButton");

var closePhotosButton = document.querySelector(".closePhotosButton");
var viewPhotosButton = document.querySelector(".viewPhotosButton");

var viewArticlesImages = document.querySelector(".viewArticlesImages");

var success = document.querySelector(".success");
var error = document.querySelector(".errorMessage");

addArticleButton.addEventListener("click", function () {
  addArticleDiv.classList.remove("invisible");
  // addArticleDiv.classList.add("animForm");
});
closeAddArticleButton.addEventListener("click", function () {
  addArticleDiv.classList.add("invisible");
});

viewPhotosButton.addEventListener("click", function () {
  viewArticlesImages.classList.remove("invisible");
});
closePhotosButton.addEventListener("click", function () {
  viewArticlesImages.classList.add("invisible");
});
