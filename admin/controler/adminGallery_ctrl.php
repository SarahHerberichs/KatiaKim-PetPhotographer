<?php

$galleryRepo=new GalleryRepository();
$gallerys=$galleryRepo->listGallery();

$ArticleRepository = new ArticleRepository();
$AdminMessages = [
    'sendSuccess' => '',
    'requiredPhoto' => '',
    'requiredTitle' => '',
    'requiredGallery' => '',

];
//si formulaire soumis, instanciation d'un Article pour set les elements
if ( isset ($_POST['submitNewArticle']) ) {
    $article = new Article();

    $AdminMessages['requiredPhoto'] = 
    $article ->setPhoto (
        ($_POST['inputPhoto'])
    );
    $AdminMessages['requiredTitle'] =
    $article ->setName (
        $_POST['inputTitle']
    );
    $AdminMessages['requiredGallery'] =
    $article->setGalleryId(
        ($_POST['gallerySelect'])
    );
   var_dump($article);
    // si les msg d'erreurs sont vides
    if (
        empty($AdminMessages['requiredPhoto']) &&
        empty($AdminMessages['requiredTitle']) &&
        empty($AdminMessages['requiredGallery'])
    )
    {
        //insertion de l'article sété dans la BDD et envoi msg de validation
        $ArticleRepository->createArticle($article);
        $AdminMessages['sendSuccess'] = 'Article Bien Crée';
    }
}

require 'admin/view/adminGallery.phtml';

