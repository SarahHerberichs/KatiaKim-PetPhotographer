<?php

$isLogged = false;

$userMessages = [
    'sendSuccess' => '',
    'requiredLogin' => '',
    'requiredPassword' => '',
];

    if (isset ($_POST['accountSubmit']) ) {
        $TryConnectCredentials = new TryConnectCredentials();
        $userMessages['requiredLogin'] = $TryConnectCredentials ->setLogin(
        htmlentities($_POST['login'])
        );
        $userMessages['requiredPassword'] = $TryConnectCredentials ->setPassword(
            htmlentities($_POST['password'])
        );
        if ( (empty($userMessages['requiredLogin'])) && (empty($userMessages['requiredPassword'])) ) 
        {
            $adminRep = new AdminRepository();
            $adminLog = $adminRep->retrieveAdminLoginDatas();
            
            if ($adminLog) {
                
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
                    $_SESSION['isAdmin'] = false;
                    header('Location:?page=adminLogin');
            }
        }
    }
require 'admin/view/adminLogin.phtml';