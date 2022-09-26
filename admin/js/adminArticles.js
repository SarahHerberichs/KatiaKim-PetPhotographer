var addArticleButton = document.querySelector(".addArticleButton");
var viewPhotosButton = document.querySelector(".viewPhotosButton");
var closePhotosButton = document.querySelector(".closePhotosButton");
var viewArticlesImages = document.querySelector(".viewArticlesImages");
var addArticleDiv = document.querySelector(".addArticle");
var success = document.querySelector(".success");
var error = document.querySelector(".errorMessage");
console.log(error);

addArticleButton.addEventListener("click", function () {
  addArticleDiv.classList.add("visible");
  // addArticleDiv.classList.add("animForm");
});

viewPhotosButton.addEventListener("click", function () {
  viewArticlesImages.classList.remove("invisible");
});
closePhotosButton.addEventListener("click", function () {
  viewArticlesImages.classList.add("invisible");
});
