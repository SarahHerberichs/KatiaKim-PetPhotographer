<?php

//Nvelle Repository de la Gallery
//$articleRepo = new ArticleRepository();
$photoRepo = new PhotoRepo();
//Insertion  en dure d'une galleryName
$gallery = new Gallery();
$gallerySetName = $gallery ->setName("galleryFamilleAnimaux");
$galleryGetName = $gallery ->getName();



//messages d'erreur initialisés
    $AdminPhotosMessages = [
        'wrongExt' => '',
        'sendSuccess' => '',
        'requiredPhoto' => '',
    ];
        //si formulaire soumis,création d'une photo pour gestion des erreurs ou Set de ses parametres
        //bouton submit , bouton champ d'entrée
        if ( isset ($_POST['addNewPhoto']) && (isset($_FILES['inputPhoto']))) {
            //créa d'une nv photo 
            $photo = new Photo ();
        /*------------------------Gestion Photos-------------------------*/
            $fileName = $_FILES['inputPhoto']['name'];
            $fileTmpName = $_FILES['inputPhoto']['tmp_name'];
            //list des extensions valides
            $validExt = ['.jpeg', '.jpg', '.gif', '.png'];
            //recup de l'extension du fichier
            $fileExt = ".". strtolower( substr(strchr($fileName, "."),1) );
            //Destination finale de la photo
            $fileDest = "admin/files/".$fileName;
        /*--------------------------------------------------------------*/ 

        /*---------Set des champs saisis et des msg d'erreurs-----------*/
           
        //-1----------------------Set la photo------------------------
           //Set et éventuel msg d'erreur
            $AdminPhotosMessages['requiredPhoto'] = 
            $photo ->setPhoto (
                //champ d'entré de la photo inputPhoto
                ($_FILES['inputPhoto']['name'])
            );   
        //si pas d'oubli de photo, mais que probleme d'extension, msg d'erreur
            if (
                $AdminPhotosMessages['requiredPhoto'] === "" 
                && 
            (!in_array($fileExt, $validExt)) 
                ) {
                $AdminPhotosMessages['wrongExt'] = "Mauvaise Extension";
            } 
  
        //-2-------------------Set du nom de la photo--------------------
            $photo ->setName(
                $_FILES['inputPhoto']['name']
            );
        //-3-----------------Set de l'article_id associé-----------------
            $photo ->setArticleId(
                ($_POST['articleId'])
                );
           
        //-4------------- si les msg d'erreurs sont vides----------------
            if (
                empty ($AdminPhotosMessages['requiredPhoto']) &&
               // empty ($AdminPhotosMessages['requiredArticle']) &&
                empty ($AdminPhotosMessages['wrongExt'])
            )
            {
        //et que le telechargement de la photo a reussi
                if (move_uploaded_file($fileTmpName, $fileDest)) {
                //ALORS créa d'une photo à partir des elts saisis
                $photoRepo ->createPhoto($photo);
                // ajout de cette photo dans PhotoList
                $AdminPhotosMessages ['sendSuccess'] = 'Photo Bien Crée';
                }  
            }   
        }  
       /* $articleRepo = new ArticleRepository();
        $articles = $articleRepo->listArticles();
        var_dump($articles);
        */
        $articleRep = new ArticleRepo();
        $articlesByGallery = $articleRep->listArticlesByGallery("galleryFamilleAnimaux");
        var_dump($articlesByGallery);
         
        
require 'view/gallery-famille-animaux/gallery-famille-animaux.phtml';

?>


