<?php
/*----------------------------------------------------------------------------------------------------------------------*/
/*------------------------------------------------GESTION DES ARTICLES------------------------------------------------- */
/*----------------------------------------------------------------------------------------------------------------------*/


$galleryRepo = new GalleryRepository();
//Pour Récup Array : la liste de galleries(Affiché dans les Selects du formulaire ajout d'article)
$gallerys = $galleryRepo->listGallery();


$articleRepo = new ArticleRepository();
//Récup Array: la liste Articles
$articles = $articleRepo->listArticles();


/*-------------------------------------------------------------------------------------------*/
/*--------------------------------Création / Supression Article----------------------------- */
/*-------------------------------------------------------------------------------------------*/


//Créa d'un Array de messages d'erreurs vides
//Block article invisible (visible au click sur + (JS))
$addArticleVisibility = "invisible";
$AdminMessages = [
    'wrongExt' => '',
    'sendSuccess' => '',
    'requiredPhoto' => '',
    'requiredTitle' => '',
    'requiredGallery' => ''
];

    //Supression Article
    if ( isset ($_POST['deleteArticleButton']) ) {
        $articleRepo-> deleteArticle($_POST['articleId']);
        header("Refresh:2");
    }

    //Création Article + Messages erreurs
    if ( isset ($_POST['submitNewArticle']) && (isset($_FILES['inputMainPhoto'])) ) {
        $article = new Article();
           
        /*-----------------------Gestion Propriétés Photos-------------------------*/
        $fileName = $_FILES['inputMainPhoto']['name'];
        $fileTmpName = $_FILES['inputMainPhoto']['tmp_name'];
        $validExt = ['.jpeg', '.jpg', '.gif', '.png'];
        //Recup de l'extension du fichier
        $fileExt = ".". strtolower( substr(strchr($fileName, "."),1) );
        //Destination de la photo
        $fileDest = "admin/files/".$fileName;
            

        /*---------------Set des champs saisis et des msg d'erreurs---------------*/

        //-1--------------------------Set la photo--------------------------------
        $AdminMessages['requiredPhoto'] = 
        $article ->setPhoto($fileName);   
        //Si pas d'oubli de photo, mais que probleme d'extension, msg d'erreur
        if ( $AdminMessages['requiredPhoto'] === "" && (!in_array($fileExt, $validExt)) ) {
            $AdminMessages['wrongExt'] = "Invalid file Extension";
        } 

        //-2----------------------Set du titre----------------------------------
        $AdminMessages ['requiredTitle'] = $article ->setName ($_POST['inputTitle']);
            
        //-3-----------------Set De l'id de la gallery associée-----------------
        $AdminMessages['requiredGallery'] = $article ->setGalleryId($_POST['gallerySelect']);
            
        //-4-------------Si les msg d'erreurs sont vides-----------------------
        if (
            empty ($AdminMessages['requiredPhoto']) &&
            empty ($AdminMessages['requiredTitle']) &&
            empty ($AdminMessages['requiredGallery']) &&
            empty ($AdminMessages['wrongExt'])
        ) {
            //Et que le telechargement de la photo a reussi
            if (move_uploaded_file($fileTmpName, $fileDest)) {
                //insertion de l'article sété dans la BDD et envoi msg de validation
                $articleRepo ->createArticle($article);                
                $AdminMessages['sendSuccess'] = 'Article added';
                header("Refresh:2");
            } 
        }  
            //Si msg erreurs, block add article reste visible
            $addArticleVisibility = "";
    }
           
    

/*----------------------------------------------------------------------------------------------------------------------*/
/*--------------------------------------------AJOUT + SUPRESSION DE PHOTOS---------------------------------------------- */
/*----------------------------------------------------------------------------------------------------------------------*/
$galleryControl = new MainGalleryControl();

//Methode d'ajout photos                           (submit     , inputFile   , article associé ) + retour msg
$AdminPhotosMessages= $galleryControl->addPhotos ( 'addNewPhoto', 'inputPhoto', 'articleId');
//Methode supression photo (submit/ id de la photo/ article associé)
$galleryControl->deleteThisPhoto ('deleteThisPhoto','photoIdToDelete', 'articleId');

require 'admin/view/admin-articles.phtml';

