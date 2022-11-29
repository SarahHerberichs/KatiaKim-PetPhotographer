/*------------------------------------------------------------------- ----------------------------------------------------*/
/*-----------------------------------------------Gestion visibilité aux evenements click--------------------------------- */
/*------------------------------------------------------------------- ----------------------------------------------------*/

/*Déclaration variables*/
let addArticleButton = document.querySelector(".addArticleButton");
let addArticleDiv = document.querySelector(".addArticleDiv");
let closeAddArticleButton = document.querySelector(".closeAddArticleButton");
let tableAdmin = document.querySelector(".tableAdmin");
let closePhotosButton = document.querySelector(".closePhotosButton");
let viewPhotosButton = document.querySelector(".viewPhotosButton");
let viewArticlesImages = document.querySelector(".viewArticlesImages");
 
/* Visibilité invisibilité add Article*/

//si block ajout article visible, la table admin est invisible (si PHP la laisse visible car msg erreur, table reste invisible)
if (!addArticleDiv.classList.contains("invisible")) {
  tableAdmin.classList.add("invisible");
}

function changeVisibility(x, y, z) {
  x.addEventListener("click", function () {
    y.classList.remove("invisible");
    z.classList.add("invisible");
  });
}
                  //cible event, elt devient visible, elt devient invisible
changeVisibility(addArticleButton, addArticleDiv, tableAdmin);
changeVisibility(closeAddArticleButton, tableAdmin, addArticleDiv);
changeVisibility(viewPhotosButton, viewArticlesImages, tableAdmin);
changeVisibility(closePhotosButton, tableAdmin, viewArticlesImages);
