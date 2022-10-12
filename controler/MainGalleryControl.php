<?php

Class MainGalleryControl {
        private array $AdminPhotosMessages;
        private array $POST;
        private array $FILES;
        private PhotoRepository $photoRepo;

    public function controlPhotos($POST,$FILES,$photoRepo) {
        $AdminPhotosMessages=[    
        'wrongExt' => '',
        'sendSuccess' => '',
        'requiredPhoto' => ''
    ];

        if ( isset ($POST['addNewPhoto']) && (isset($FILES['inputPhoto']))) {
            $photo = new Photo ();
        /*------------------------Gestion Photos-------------------------*/
            $fileName = $FILES['inputPhoto']['name'];
            $fileTmpName = $FILES['inputPhoto']['tmp_name'];
            $validExt = ['.jpeg', '.jpg', '.gif', '.png'];
            //recup de l'extension du fichier
            $fileExt = ".". strtolower( substr(strchr($fileName, "."),1) );
            //Destination de la photo
            $fileDest = "admin/files/".$fileName;
        /*--------------------------------------------------------------*/ 
    
        /*---------Set des champs saisis et des msg d'erreurs-----------*/
           
            //-1----------------------Set la photo------------------------
           //Set et éventuel messages d'erreur
            $AdminPhotosMessages['requiredPhoto'] = 
            $photo ->setPhoto ( ($FILES['inputPhoto']['name']) );   

            //si photoInséree, mais que probleme d'extension, msg d'erreur
            if (
                $AdminPhotosMessages['requiredPhoto'] === "" 
                && 
            (!in_array($fileExt, $validExt)) 
                ) {
                $AdminPhotosMessages['wrongExt'] = "Invalid File Extension";
            } 
            //-2-------------------Set du nom de la photo--------------------
            $photo ->setName( $FILES['inputPhoto']['name']);
            //-3-----------------Set de l'article_id associé-----------------
            $photo ->setArticleId(($POST['articleId']));
           
            //-4------------- si les msg d'erreurs sont vides----------------
            if (
                empty ($AdminPhotosMessages['requiredPhoto']) &&
               // empty ($AdminPhotosMessages['requiredArticle']) &&
                empty ($AdminPhotosMessages['wrongExt'])
            ) {
                //et que le telechargement de la photo a reussi
                if (move_uploaded_file($fileTmpName, $fileDest)) {
                //ALORS créa d'une photo à partir des elts saisis
                $photoRepo ->createPhoto($photo);
                // ajout de cette photo dans PhotoList
                $AdminPhotosMessages ['sendSuccess'] = 'Picture added';
                }     
            }  
            
        }
            return $AdminPhotosMessages;
    }
}  