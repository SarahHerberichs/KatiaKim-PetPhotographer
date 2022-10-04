<?php

$photoRepo = new PhotoRepository();
//Insertion  en dure d'une galleryName
$gallery = new Gallery();
$gallerySetName = $gallery ->setName("gallery events");
$galleryGetName = $gallery ->getName();


$galleryControl = new MainGalleryControl();
$AdminPhotosMessages= $galleryControl->controlPhotos ($_POST,$_FILES,$photoRepo); 

$articleRepo = new ArticleRepository();
$articlesByGallery = $articleRepo->listArticlesByGallery($galleryGetName); 


require 'view/gallery-events.phtml';

?>


