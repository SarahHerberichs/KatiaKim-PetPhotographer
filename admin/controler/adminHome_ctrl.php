<?php

$messageRepo = new MessageRepository();
//array contenant toutes les infos d'un msg submit
$messages = $messageRepo->listMessages();

//si le form est validé
if (isset($_POST['commentSubmit'])) {
    $adminRep=new AdminRepository();
    //instanciation pour créa d'un message (id et comment associé)
    $setNewMsgById=$messageRepo->setNewMsgWhereId($_POST['id']);
    //set du comment de ce message associé au formulaire de la vue adminHome
    $setNewMsgById->setComment($_POST['comment']);
    //update du comment
    $updateComment=$adminRep->updateComment($setNewMsgById);
}
require 'admin/view/adminHome.phtml'; 
