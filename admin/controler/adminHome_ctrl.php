<?php

$messageRepo = new MessageRepository();


//si le form est validé
if (isset($_POST['commentSubmit'])) {
    $adminRep=new AdminRepository();
    //instanciation pour créa d'un message (id et comment associé)
    $setNewMsgById=$messageRepo->setNewMsgWhereId($_POST['id']);
    //set du comment de ce message associé au formulaire de la vue adminHome
    $setNewMsgById->setComment($_POST['comment']);
    //update du comment
    $updateComment = $adminRep->updateComment($setNewMsgById);
}
    //array contenant toutes les infos d'un msg submit


if (isset ($_POST['delete'])) {
    $adminRep = new AdminRepository();
    $setNewMsgById = $messageRepo->setNewMsgWhereId($_POST['id']);
    $deleteMessage = $adminRep->deleteLine($setNewMsgById);
}


    $messages = $messageRepo->listMessages();
require 'admin/view/adminHome.phtml'; 