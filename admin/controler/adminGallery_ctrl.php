<?php

$galleryRepo=new GalleryRepository();
$gallerys=$galleryRepo->listGallery();
var_dump($gallery);

require 'admin/view/adminGallery.phtml';
