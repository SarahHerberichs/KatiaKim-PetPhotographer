<?php
//initialisation du log statut
$isLogged = false;
$userMessages = [
    'sendSuccess' => '',
    'requiredLogin' => '',
    'requiredPassword' => '',
];
//si le formulaire est soumis, gestion des msgs d'erreurs
    if (isset ($_POST['accountSubmit']) ) {
        $TryConnectCredentials = new TryConnectCredentials();
        $userMessages['requiredLogin'] = $TryConnectCredentials ->setLogin(
        htmlentities($_POST['login'])
        );
        $userMessages['requiredPassword'] = $TryConnectCredentials ->setPassword(
            htmlentities($_POST['password'])
        );
        //si les msg d'erreurs sont vides 
        if ( (empty($userMessages['requiredLogin'])) && (empty($userMessages['requiredPassword'])) ) 
        {
            
            $adminRep = new AdminRepository();
            //méthode qui retourne id,login,pwd settés
            $adminLog = $adminRep->retrieveAdminLoginDatas();
            //si méthode aboutit
            if ($adminLog) {
            //si le pwd et login sont true (parametre passé correspond aux parametres admin)
                if (
                    ( $TryConnectCredentials->isValidPassword($adminLog->getPassword()) ) &&
                    ( $TryConnectCredentials->isValidLogin($adminLog->getLogin()) )
                )
                    {
                        //session is logged = true
                        $_SESSION['isAdmin'] = true;
                        header('Location:?page=adminHome');
                    }
                } else {
                    //si conditions d'identifications pas valides, redirection
                    $_SESSION['isAdmin'] = false;
                    header('Location:?page=adminLogin');
            }
        }
    }
require 'admin/view/adminLogin.phtml';