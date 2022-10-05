<?php

$photoRepo = new PhotoRepository();

$gallery = new Gallery();
$gallerySetName = $gallery ->setName("gallery events");
$galleryGetName = $gallery ->getName();


$galleryControl = new MainGalleryControl();
$AdminPhotosMessages= $galleryControl->controlPhotos ($_POST,$_FILES,$photoRepo); 

$articleRepo = new ArticleRepository();
$articlesByGallery = $articleRepo->listArticlesByGallery($galleryGetName); 


require 'view/gallery-events.phtml';

?>


