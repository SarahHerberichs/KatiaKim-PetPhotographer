let addArticleButton = document.querySelector(".addArticleButton");
let addArticleDiv = document.querySelector(".addArticleDiv");
let closeAddArticleButton = document.querySelector(".closeAddArticleButton");
let tableAdmin = document.querySelector(".tableAdmin");
let closePhotosButton = document.querySelector(".closePhotosButton");
let viewPhotosButton = document.querySelector(".viewPhotosButton");
let viewArticlesImages = document.querySelector(".viewArticlesImages");
let success = document.querySelector(".success");
let error = document.querySelector(".errorMessage");

/*addArticleButton.addEventListener("click", function () {
  addArticleDiv.classList.remove("invisible");
  tableAdmin.classList.add("invisible");
  // addArticleDiv.classList.add("animForm");
});

closeAddArticleButton.addEventListener("click", function () {
  addArticleDiv.classList.add("invisible");
  tableAdmin.classList.remove("invisible");
});
*/
if (!addArticleDiv.classList.contains("invisible")) {
  tableAdmin.classList.add("invisible");
}
/*
viewPhotosButton.addEventListener("click", function () {
  viewArticlesImages.classList.remove("invisible");
  tableAdmin.classList.add("invisible");
});
closePhotosButton.addEventListener("click", function () {
  viewArticlesImages.classList.add("invisible");
  tableAdmin.classList.remove("invisible");
});
*/
function test(x, y, z) {
  x.addEventListener("click", function () {
    y.classList.remove("invisible");
    z.classList.add("invisible");
  });
}
test(addArticleButton, addArticleDiv, tableAdmin);
test(closeAddArticleButton, tableAdmin, addArticleDiv);
test(viewPhotosButton, viewArticlesImages, tableAdmin);
test(closePhotosButton, tableAdmin, viewArticlesImages);
