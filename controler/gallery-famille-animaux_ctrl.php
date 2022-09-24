<?php

//Nvelle Repository de la Gallery
$articleRepo = new ArticleRepo();
//nouvelle Gallery pour set un Name de gallery et le récuperer
$gallery = new Gallery();
$gallerySetName = $gallery ->setName("galleryFamilleAnimaux");
$galleryGetName = $gallery ->getName();
//Fonction pour recup tout dans article et le galleryName à partir d'un nom de gallery
$articles = $articleRepo->listArticlesByGallery($galleryGetName);

//créa d'une list pour boucler
    $photoRepository = new PhotoRepository();
    $photos = $photoRepository ->listPhotos();
   
    $AdminPhotosMessages = [
        'wrongExt' => '',
        'sendSuccess' => '',
        'requiredPhoto' => '',
    ];
    
        //si formulaire soumis,création d'un article pour gestion des erreurs ou Set de ses parametres
        //bouton submit , bouton champ d'entré
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
           
        /*-1----------------------Set la photo------------------------*/
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
  
        /*-2-------------------Set du nom de la photo--------------------*/
            $photo ->setName(
                $_FILES['inputPhoto']['name']
            );
        /*-3-----------------Set de l'article_id associé-----------------*/
            $photo ->setArticleId(
                ($_POST['articleId'])
                );
           
        /*-4------------- si les msg d'erreurs sont vides----------------*/
            if (
                empty ($AdminPhotosMessages['requiredPhoto']) &&
               // empty ($AdminPhotosMessages['requiredArticle']) &&
                empty ($AdminPhotosMessages['wrongExt'])
            )
            {
                //et que le telechargement de la photo a reussi
                if (move_uploaded_file($fileTmpName, $fileDest)) {
                //ALORS insertion de l'article sété dans la BDD et envoi msg de validation
                $photoRepository ->createPhoto($photo);
                $AdminPhotosMessages ['sendSuccess'] = 'Photo Bien Crée';
              
                }  
            }   
        }  
        //tentative de recup liste de photo par ID ---Pb recup id de la MainPhoto
            $newPhotoRep = new PhotoRepo();
            $photosByArt = $newPhotoRep ->listPhotosByArticle('003b3d91-3c16-11ed-b26c-d4ae52cd72ed');
            var_dump($photosByArt);
        
require 'view/gallery-famille-animaux/gallery-famille-animaux.phtml';

?>


