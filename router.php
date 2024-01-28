<?php  


if (isset($_SESSION['isAdmin']) && ($_SESSION ['isAdmin']===true)) {

    $page = isset($_GET['page']) ? $_GET['page'] : 'home'; 
    
    switch($page){
        case 'home':
            require 'controler/home_ctrl.php';
            break;
        case 'gallery-events':
            require 'controler/gallery-events_ctrl.php';
            break;
        case 'gallery-pets-and-family':
            require 'controler/gallery-pets-and-family_ctrl.php';
            break;
        case 'gallery-black-and-white' : 
            require 'controler/gallery-black-and-white_ctrl.php';
            break;
        case 'investment':
            require 'controler/investment_ctrl.php';
            break;
        case 'contact':
            require 'controler/contact_ctrl.php';
            break;
        case 'admin-login':
            require 'admin/controler/admin-login_ctrl.php';
            break;
        case 'admin-home':
            require 'admin/controler/admin-home_ctrl.php';
            break;
        case 'admin-articles':
            require 'admin/controler/admin-articles_ctrl.php';
            break;
        default:
            require 'controler/home_ctrl.php';
            break;
    }
} else {

        $page = isset($_GET['page']) ? $_GET['page'] : 'home'; 

        switch($page){
            case 'adminvideo' :
                require 'controler/adminvideo_ctrl.php';
            case 'home':
                require 'controler/home_ctrl.php';
                break;
            case 'gallery-events':
                require 'controler/gallery-events_ctrl.php';
                break;
            case 'gallery-pets-and-family':
                require 'controler/gallery-pets-and-family_ctrl.php';
                break;
            case 'gallery-black-and-white' : 
                require 'controler/gallery-black-and-white_ctrl.php';
                break;
            case 'investment':
                require 'controler/investment_ctrl.php';
                break;
            case 'contact':
                require 'controler/contact_ctrl.php';
                break;
            case 'admin-login':
                require 'admin/controler/admin-login_ctrl.php';
                break;
            default:
                require 'controler/home_ctrl.php';
                break;
                
        }
    }