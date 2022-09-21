<?php
//Nvelle Repository de GalleryEvent
$galleryEvent=new GalleryEventRepository();
//nouvelle Gallery pour setter un Name de gallery
$gallery=new Gallery();
$gallerySetName=$gallery->setName("galleryEvenements");
$galleryGetName=$gallery->getName();

//Fonction pour recup tout dans article et le galleryName à partir d'une string nom de gallery
$articles=$galleryEvent->listArticlesByGallery($galleryGetName);
var_dump($articles);

require 'view/gallery-evenements/gallery-evenements.phtml';

?>
