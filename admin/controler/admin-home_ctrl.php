<?php

$messageRepo = new MessageRepository();

//si le form "comment" est validé
if (isset($_POST['commentSubmit'])) {
    $adminRep = new AdminRepository();
    //instanciation pour créa d'un message (id et comment associé)
    $msgById = $messageRepo ->getMsgById($_POST['id']);
    //set du comment de ce message associé au formulaire de la vue adminHome
    $msgById ->setComment($_POST['comment']);
    //update du comment
    $updateComment = $adminRep->updateComment($msgById);
}

if (isset ($_POST['delete'])) {
    $adminRep = new AdminRepository();
    $msgById = $messageRepo ->getMsgById($_POST['id']);
    $deleteMessage = $adminRep ->deleteLine($msgById);
}


$messages = $messageRepo->listMessages();

require 'admin/view/admin-home.phtml'; 