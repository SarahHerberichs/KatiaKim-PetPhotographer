/* gestion visibilité aux evenements click */
let addArticleButton = document.querySelector(".addArticleButton");
let addArticleDiv = document.querySelector(".addArticleDiv");
let closeAddArticleButton = document.querySelector(".closeAddArticleButton");
let tableAdmin = document.querySelector(".tableAdmin");
let closePhotosButton = document.querySelector(".closePhotosButton");
let viewPhotosButton = document.querySelector(".viewPhotosButton");
let viewArticlesImages = document.querySelector(".viewArticlesImages");
let success = document.querySelector(".success");
let error = document.querySelector(".errorMessage");

if (!addArticleDiv.classList.contains("invisible")) {
  tableAdmin.classList.add("invisible");
}
function changeVisibility(x, y, z) {
  x.addEventListener("click", function () {
    y.classList.remove("invisible");
    z.classList.add("invisible");
  });
}
changeVisibility(addArticleButton, addArticleDiv, tableAdmin);
changeVisibility(closeAddArticleButton, tableAdmin, addArticleDiv);
changeVisibility(viewPhotosButton, viewArticlesImages, tableAdmin);
changeVisibility(closePhotosButton, tableAdmin, viewArticlesImages);
