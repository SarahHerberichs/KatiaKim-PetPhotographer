<?php
//Initialisation statut non connecté
$_SESSION['isAdmin'] = false;
$isLogged = false;
//Messages d'erreurs    
$userMessages = [
    'sendSuccess' => '',
    'requiredLogin' => '',
    'requiredPassword' => '',
];
    //si le formulaire est soumis : 
    
    if ( isset ($_POST['accountSubmit']) ) {
        //Msg erreurs + Set du Login et Pwd ENTRés
        $TryConnectCredentials = new TryConnectCredentials();
        $userMessages['requiredLogin'] = $TryConnectCredentials ->setLogin ( htmlentities($_POST['login']) );
        $userMessages['requiredPassword'] = $TryConnectCredentials ->setPassword( htmlentities($_POST['password']) );
    
        //Si champs erreur vides
        if ( (empty($userMessages['requiredLogin'])) && (empty($userMessages['requiredPassword'])) ) {
            $adminRep = new AdminRepository();
            //méthode Recup identifiants REELS en instanciant AdminCredentials et les push dans un tableau class AdminCredentials
            $adminLog = $adminRep->retrieveAdminLoginDatas();
            //si méthode aboutit
            if ($adminLog) {
                //ET SI vérification que le identifiants settés = identifiants REELS OK
                if ( $TryConnectCredentials->isValidPassword($adminLog->getPassword()) && $TryConnectCredentials->isValidLogin($adminLog->getLogin()) ) { 
                //ALORS : CONNEXION OK + Dirige page accueil admin
                    $_SESSION['isAdmin'] = true;
                    header('Location:?page=admin-home');
                }
            //SINON
            } else {
                //Reste sur page Login
                $_SESSION['isAdmin'] = false;
                header('Location:?page=admin-login');
            }
        }
    }
   
require 'admin/view/admin-login.phtml';