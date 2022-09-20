<?php  


if (isset($_SESSION['isAdmin']) && ($_SESSION ['isAdmin']===true)) {

$page = isset($_GET['page']) ? $_GET['page'] : 'home'; 
   
    switch($page){
        case 'home':
            require 'controler/home_ctrl.php';
            break;
        case 'galleryEvenements':
            require 'controler/gallery-evenements_ctrl.php';
            break;
        case 'galleryFamilleAnimaux':
            require 'controler/gallery-famille-animaux_ctrl.php';
            break;
        case 'galleryNB' : 
            require 'controler/gallery-nb_ctrl.php';
            break;
        case 'tarifs-infos':
            require 'controler/tarifs-infos_ctrl.php';
            break;
        case 'contact':
            require 'controler/contact_ctrl.php';
            break;
            case 'adminLogin':
                require 'admin/controler/adminLogin_ctrl.php';
                break;
            case 'adminHome':
                require 'admin/controler/adminHome_ctrl.php';
                break;
            case 'adminGallery';
                require 'admin/controler/adminGallery_ctrl.php';
                break;
        default:
            require 'controler/home_ctrl.php';
            break;
    }
}   

   else {
$page = isset($_GET['page']) ? $_GET['page'] : 'home'; 

    switch($page){
        case 'home':
            require 'controler/home_ctrl.php';
            break;
        case 'galleryEvenements':
            require 'controler/gallery-evenements_ctrl.php';
            break;
        case 'galleryFamilleAnimaux':
            require 'controler/gallery-famille-animaux_ctrl.php';
            break;
        case 'galleryNB' : 
            require 'controler/gallery-nb_ctrl.php';
            break;
        case 'tarifs-infos':
            require 'controler/tarifs-infos_ctrl.php';
            break;
        case 'contact':
            require 'controler/contact_ctrl.php';
            break;
        case 'adminLogin':
            require 'admin/controler/adminLogin_ctrl.php';
            break;
        default:
            require 'controler/home_ctrl.php';
            break;
            
    }
}