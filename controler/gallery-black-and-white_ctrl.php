<?php
/* Recup des infos pour affichage d'un article déjà crée + gestion d'ajout de photos*/

/*Classe qui contient la créa et la recup des photos*/
$photoRepo = new PhotoRepository();

/*Insertion en dure d'une galleryName*/
$gallery = new Gallery();
$gallerySetName = $gallery ->setName("gallery black & white");
$galleryGetName = $gallery ->getName();

/*AJOUT PHOTOS PAR ADMIN */
/*Classe contenant methode pour ajouter une photo dans un article et Set les messages d'erreur */
$galleryControl = new MainGalleryControl();
$AdminPhotosMessages = $galleryControl->controlPhotos ($_POST,$_FILES,$photoRepo); 


/* Affichage */
$articleRepo = new ArticleRepository();
$articlesByGallery = $articleRepo->listArticlesByGallery($galleryGetName); 





require 'view/gallery-black-and-white.phtml';

?>


