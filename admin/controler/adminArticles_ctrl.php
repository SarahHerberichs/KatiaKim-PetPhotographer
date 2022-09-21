<?php
//Liste des galleries pour affichage dans le formulaire
$galleryRepo=new GalleryRepository();
$gallerys=$galleryRepo->listGallery();
//Instanciation d'un article repository et création d'un Array de messages d'erreurs vides
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

        //GESTION PHOTO //
        $fileName=$_FILES['inputPhoto']['name'];
        $fileTmpName=$_FILES['inputPhoto']['tmp_name'];
        $validExt=['.jpeg', '.jpg', '.gif', '.png'];
        //créa d'un nom unique
        $uniqueName= uniqid('',true);
        //recup de l'extension du fichier
        $fileExt= ".". strtolower(substr(strchr($fileName, "."),1));
        //FileName= unique + ajout de son extension
        $fileName= $uniqueName.".".$fileExt;
        //Fichier de destination .../uniqname.jpg
        $fileDest="admin/files/".$fileName;
    //if (move_uploaded_file($fileTmpName, $fileDest)) {
/*-------------------Set des elements saisis (avec ou sans msg d'erreurs)-----------*/

        /*-----------------------Set la photo------------------------*/
        $AdminMessages['requiredPhoto'] = 
        $article ->setPhoto (
            ($_FILES['inputPhoto']['name'])
        );
        //si pas d'oubli de photo, et que probleme d'extension, msg d'erreur
        if (
            $AdminMessages['requiredPhoto']=== "" 
            && 
        (!in_array($fileExt, $validExt)) 
            ) {
            $AdminMessages['wrongExt'] = "Mauvaise Extension";
        } 
        /*----------------Set du titre et de la gallery--------------*/
        $AdminMessages['requiredTitle'] =
        $article ->setName (
            $_POST['inputTitle']
        );
        $AdminMessages['requiredGallery'] =
        $article->setGalleryId(
            ($_POST['gallerySelect'])
        );
       

        /*-------------- si les msg d'erreurs sont vides--------------*/
        if (
            empty($AdminMessages['requiredPhoto']) &&
            empty($AdminMessages['requiredTitle']) &&
            empty($AdminMessages['requiredGallery']) &&
            empty($AdminMessages['wrongExt'])
        )
        {
            //et que le telechargement de la photo a reussi
            if (move_uploaded_file($fileTmpName, $fileDest)) {
            //insertion de l'article sété dans la BDD et envoi msg de validation
            $ArticleRepository->createArticle($article);
            $AdminMessages['sendSuccess'] = 'Article Bien Crée';
            } 
        }
    }

    require 'admin/view/adminArticles.phtml';

