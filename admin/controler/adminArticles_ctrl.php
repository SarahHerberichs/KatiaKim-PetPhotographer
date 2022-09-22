<?php
//Liste des galleries pour affichage dans le formulaire
$galleryRepo = new GalleryRepository();
$gallerys = $galleryRepo->listGallery();
$articleRepo=new ArticleRepository();
$articles=$articleRepo->listArticles();

//Instanciation d'un article repository et création d'un Array de messages d'erreurs vides
$ArticleRepository = new ArticleRepository();
$AdminMessages = [
    'wrongExt' => '',
    'sendSuccess' => '',
    'requiredPhoto' => '',
    'requiredTitle' => '',
    'requiredGallery' => ''
];
$fileArray= [];
    //si formulaire soumis,création d'un article pour gestion des erreurs ou Set de ses parametres
    if ( isset ($_POST['submitNewArticle']) && (isset($_FILES['inputMainPhoto']))) {
        $article = new Article();
        
    /*-----------------------Gestion Photos-------------------------*/
        $fileName = $_FILES['inputMainPhoto']['name'];
        $fileTmpName = $_FILES['inputMainPhoto']['tmp_name'];
        //list des extensions valides
        $validExt = ['.jpeg', '.jpg', '.gif', '.png'];
        //recup de l'extension du fichier
        $fileExt = ".". strtolower( substr(strchr($fileName, "."),1) );
        //Destination finale de la photo
        $fileDest ="admin/files/".$fileName;
    /*--------------------------------------------------------------*/ 

    /*--------Set des champs saisis et des msg d'erreurs-----------*/

    /*-1----------------------Set la photo------------------------*/
       //Set et éventuel msg d'erreur
        $AdminMessages['requiredPhoto'] = 
        $article ->setPhoto (
            ($_FILES['inputMainPhoto']['name'])
        );   
        //si pas d'oubli de photo, mais que probleme d'extension, msg d'erreur
        if (
            $AdminMessages['requiredPhoto'] === "" 
            && 
        (!in_array($fileExt, $validExt)) 
            ) {
            $AdminMessages['wrongExt'] = "Mauvaise Extension";
        } 
    /*-2---------------Set du titre et de la gallery--------------*/
        $AdminMessages['requiredTitle'] =
        $article ->setName (
            $_POST['inputTitle']
        );
       
    /*-3-------------Set De l'id de la gallery associée------------*/
        $AdminMessages['requiredGallery'] =
        $article ->setGalleryId(
            ($_POST['gallerySelect'])
        );
    
    /*-4------------- si les msg d'erreurs sont vides--------------*/
        if (
            empty ($AdminMessages['requiredPhoto']) &&
            empty ($AdminMessages['requiredTitle']) &&
            empty ($AdminMessages['requiredGallery']) &&
            empty ($AdminMessages['wrongExt'])
        )
        {
            //et que le telechargement de la photo a reussi
            if (move_uploaded_file($fileTmpName, $fileDest)) {
            //insertion de l'article sété dans la BDD et envoi msg de validation
            $ArticleRepository ->createArticle($article);
            $AdminMessages['sendSuccess'] = 'Article Bien Crée';
            } 
        }   
    }  

    require 'admin/view/adminArticles.phtml';

