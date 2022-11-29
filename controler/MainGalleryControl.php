<?php
/*----------------------------------------------------------------------------------------------------------------------*/
/*----------------------------------------------------CREATIONS  PHOTOS------------------------------------------------ */
/*----------------------------------------------------------------------------------------------------------------------*/

Class MainGalleryControl {


    public function __construct () {
        $this->photoRepo = new photoRepository();
    }
                                //btn confirm , inputFile, article associé
    public function addPhotos( $confirmAddPhoto, $inputPhoto, $articleId ) {
        $AdminPhotosMessages=[    
        'wrongExt' => '',
        'sendSuccess' => '',
        'requiredPhoto' => ''
    ];

        if ( isset ($_POST[$confirmAddPhoto]) && (isset($_FILES[$inputPhoto]))) {
            $photo = new Photo ();
            
            for ($i=0; $i<count($_FILES[$inputPhoto]['name']); $i++) {
                
                /*-----------------------Propriétés Photos------------------*/
                $fileName = $_FILES[$inputPhoto]['name'][$i];
                $fileTmpName = $_FILES[$inputPhoto]['tmp_name'][$i];
                $validExt = ['.jpeg', '.jpg', '.gif', '.png'];
                //recup de l'extension du fichier
                $fileExt = ".". strtolower( substr(strchr($fileName, "."),1) );
                //Destination de la photo
                $fileDest = "admin/files/".$fileName;
            
        
                /*---------Set des champs saisis et des msg d'erreurs-----------*/
            
                //-1----------------------Set la photo------------------------
                //Set et éventuel messages d'erreur
                $AdminPhotosMessages['requiredPhoto'] = 
                $photo ->setPhoto ( $fileName );   

                //Si photoInséree, mais que probleme d'extension, msg d'erreur
                if ($AdminPhotosMessages['requiredPhoto'] === "" && (!in_array($fileExt, $validExt)) ) {
                    $AdminPhotosMessages['wrongExt'] = "Invalid File Extension";
                } 
                //-2-------------------Set du nom de la photo--------------------
                $photo ->setName( $fileName);
                //-3-----------------Set de l'article_id associé-----------------
                $photo ->setArticleId(($_POST[$articleId]));
            
                //-4--------------si les msg d'erreurs sont vides----------------
                if ( empty ($AdminPhotosMessages['requiredPhoto']) &&  empty ($AdminPhotosMessages['wrongExt'])) {
                    //et que le telechargement de la photo a reussi
                    if (move_uploaded_file($fileTmpName, $fileDest)) {
                        //ALORS créa d'une photo à partir des elts saisis
                        $this->photoRepo ->createPhoto($photo);
                        // ajout de cette photo dans PhotoList
                        header("Refresh:2");
                        $AdminPhotosMessages ['sendSuccess'] = 'Picture added';
                    }     
                }    
            }
        }
    return $AdminPhotosMessages;
    }

    public function deleteThisPhoto($BtnDeletePhoto, $photoToDelete, $articleId){
        if (isset ($_POST[$BtnDeletePhoto])) {
            $this->photoRepo ->deletePhoto( ($_POST[$photoToDelete]), ($_POST[$articleId]));
            header("Refresh:0");
        }
    }

}  