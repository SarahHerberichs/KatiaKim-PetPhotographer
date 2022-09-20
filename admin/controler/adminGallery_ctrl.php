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
    $fileName=$_FILES['inputPhoto']['name'];
    var_dump($_FILES['inputPhoto']);
    //renvoi le lien de l'image sur mon DD
    $fileTmpName=$_FILES['inputPhoto']['tmp_name'];
    $validExt=['.jpeg', '.jpg', '.gif', '.png'];
    //recup de l'extension insérée
    $fileExt= ".". strtolower(substr(strchr($fileName, "."),1));
    $targetFile = basename($fileName);
    $fileDest="admin/files/".$fileName;
    echo($fileName).'<br>';
    echo($fileTmpName). '<br>';
    echo($targetFile). '<br>';


    //Verification du format d'image? Si Non message d'erreur//
    if (!in_array($fileExt, $validExt)) {
        $AdminMessages['wrongExt'] = "Mauvaise Extension";
    } 
    //Verif Photo et Titre et Gallery saisis, 
    //Set des msg d'erreurs éventuels, Set des différents elts
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
        if (move_uploaded_file($fileTmpName, $fileDest)) {
        //insertion de l'article sété dans la BDD et envoi msg de validation
        $ArticleRepository->createArticle($article);
        $AdminMessages['sendSuccess'] = 'Article Bien Crée';
        } 
    }
  
}

require 'admin/view/adminGallery.phtml';

