<?php

/*--------------------------CREA D'UN ARTICLE SELON LA GALLERY SELECTIONNEE-------------------------- */

//Pour Affichage Formulaire Ajout d'articles
$galleryRepo = new GalleryRepository();
$gallerys = $galleryRepo->listGallery();

//Pour Liste Articles
$articleRepo = new ArticleRepository();
$articles = $articleRepo->listArticles();

//Instanciation d'un article repository et création d'un Array de messages d'erreurs vides
$addArticleVisibility = "invisible";
$AdminMessages = [
    'wrongExt' => '',
    'sendSuccess' => '',
    'requiredPhoto' => '',
    'requiredTitle' => '',
    'requiredGallery' => ''
];
if (isset ($_POST['deleteArticleButton'])) {
   $articleRepo-> deleteArticle($_POST['articleId']);
}
    //si formulaire soumis, création d'un article pour gestion des erreurs ou Set de ses parametres
    if ( isset ($_POST['submitNewArticle']) && (isset($_FILES['inputMainPhoto'])) ) {
        $article = new Article();
        /*-----------------------Gestion Photos-------------------------*/
        $fileName = $_FILES['inputMainPhoto']['name'];
        $fileTmpName = $_FILES['inputMainPhoto']['tmp_name'];
        $validExt = ['.jpeg', '.jpg', '.gif', '.png'];
        //recup de l'extension du fichier
        $fileExt = ".". strtolower( substr(strchr($fileName, "."),1) );
        $fileDest = "admin/files/".$fileName;
        /*--------------------------------------------------------------*/ 

        /*---------Set des champs saisis et des msg d'erreurs-----------*/

        /*-1----------------------Set la photo------------------------*/
       //Set et éventuel msg d'erreur
        $AdminMessages['requiredPhoto'] = 
        $article ->setPhoto($_FILES['inputMainPhoto']['name']);   
        //si pas d'oubli de photo, mais que probleme d'extension, msg d'erreur
        if (
            $AdminMessages['requiredPhoto'] === "" 
            && 
            (!in_array($fileExt, $validExt)) 
            ) {
                $AdminMessages['wrongExt'] = "Invalid file Extension";
        } 
        /*-2---------------Set du titre et de la gallery--------------*/
        $AdminMessages ['requiredTitle'] =
        $article ->setName ($_POST['inputTitle']);
        
        /*-3-------------Set De l'id de la gallery associée------------*/
        $AdminMessages['requiredGallery'] =
        $article ->setGalleryId($_POST['gallerySelect']);
         /*-4------------- si les msg d'erreurs sont vides--------------*/
        if (
            empty ($AdminMessages['requiredPhoto']) &&
            empty ($AdminMessages['requiredTitle']) &&
            empty ($AdminMessages['requiredGallery']) &&
            empty ($AdminMessages['wrongExt'])
        ) {
            //et que le telechargement de la photo a reussi
            if (move_uploaded_file($fileTmpName, $fileDest)) {
            //insertion de l'article sété dans la BDD et envoi msg de validation
                $articleRepo ->createArticle($article);
                $AdminMessages['sendSuccess'] = 'Article added';
                $addArticleVisibility = "invisible";
            } 
        }  
            $addArticleVisibility = "";
    }  
/*--------------------------------Créa d'une Photo---------------------------------------- */
    //créa d'une list pour boucler
    $photoRepo = new PhotoRepository();
    
    $galleryControl = new MainGalleryControl();
    $AdminPhotosMessages= $galleryControl->controlPhotos ($_POST,$_FILES,$photoRepo);
        
    require 'admin/view/admin-articles.phtml';

