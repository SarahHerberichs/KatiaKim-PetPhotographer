<?php
//Liste des galleries pour affichage dans le formulaire
$galleryRepo=new GalleryRepository();
$gallerys=$galleryRepo->listGallery();
//Instanciation d'un article repository et création de messages d'erreurs vides
$ArticleRepository = new ArticleRepository();
$AdminMessages = [
    'wrongExt' => '',
    'sendSuccess' => '',
    'requiredPhoto' => '',
    'requiredTitle' => '',
    'requiredGallery' => ''
];
//si formulaire soumis,création d'un article pour gestion des erreurs ou Set de ses parametres
if ( isset ($_POST['submitNewArticle']) && (isset($_FILES['inputPhoto']))) {
    $article = new Article();

   //GESTION EXTENSIONS //
    $fileSize=$_FILES['inputPhoto']['size'];
    $fileName=$_FILES['inputPhoto']['name'];
    $fileTmpName=$_FILES['inputPhoto']['tmp_name'];
    $validExt=['.jpeg', '.jpg', '.gif', '.png'];
    $fileExt= ".". strtolower(substr(strchr($fileName, "."),1));
    $target_file = basename($fileName);
    $uniqueName=md5(uniqid(rand(), true));
    $fileName="files/".$uniqueName.$fileExt;
    echo($fileName).'<br>';
    echo($fileTmpName). '<br>';
    echo($target_file). '<br>';

if (move_uploaded_file($fileName, $target_file)) {
        //VERIF FORMAT FICHIER, si pas bon, message d'erreur//
    if (!in_array($fileExt, $validExt)) {
        $AdminMessages['wrongExt'] = "Mauvaise Extension";
    } 
    //SI BON FORMAT , set de la photo
    $AdminMessages['requiredPhoto'] = 
    $article ->setPhoto (
        ($_FILES['inputPhoto']['name'])
    ); 
    $AdminMessages['requiredTitle'] =
    $article ->setName (
        $_POST['inputTitle']
    );
    $AdminMessages['requiredGallery'] =
    $article->setGalleryId(
        ($_POST['gallerySelect'])
    );
    // si les msg d'erreurs sont vides
    if (
        empty($AdminMessages['requiredPhoto']) &&
        empty($AdminMessages['requiredTitle']) &&
        empty($AdminMessages['requiredGallery']) &&
        empty($AdminMessages['wrongExt'])
    )
    {
        //insertion de l'article sété dans la BDD et envoi msg de validation
        $ArticleRepository->createArticle($article);
        $AdminMessages['sendSuccess'] = 'Article Bien Crée';
    } 
}
      
    
  
}

require 'admin/view/adminGallery.phtml';

