<?php
/*----------------------------------------------------------------------------------------------------------------------*/
/*-------------------------------------AFFICHAGE D'ARTICLES + AJOUT PHOTO  PAR L'ADMIN--------------------------------- */
/*----------------------------------------------------------------------------------------------------------------------*/

//Classe pour création et recup photos
$photoRepo = new PhotoRepository();

//Insertion de la galleryName en dur
$gallery = new Gallery();
$gallerySetName = $gallery ->setName("gallery events");
$galleryGetName = $gallery ->getName();

//AJOUT PHOTOS 

//Classe contenant methode pour ajouter une photo dans un article et Set les messages d'erreur 
$galleryControl = new MainGalleryControl();
//Ajout/Supress + Msg erreurs
$AdminPhotosMessages= $galleryControl->addPhotos ( 'addNewPhoto', 'inputPhoto', 'articleId');
$galleryControl->deleteThisPhoto ('deleteThisPhoto','photoIdToDelete', 'articleId');

// Affichage des articles
$articleRepo = new ArticleRepository();
$articlesByGallery = $articleRepo->listArticlesByGallery($galleryGetName); 


require 'view/gallery-events.phtml';

?>


