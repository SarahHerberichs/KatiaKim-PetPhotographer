<?php
/*-------------------------------------------------------------------------------------------*/
/*--------------------------------MESSAGERERIE:COMMENT + DELETE----------------------------- */
/*-------------------------------------------------------------------------------------------*/
$messageRepo = new MessageRepository();

//COMMENT

//si le form "comment" est validé
if ( isset($_POST['commentSubmit']) ) {
    $adminRep = new AdminRepository();
    //Recup Message
    $msgById = $messageRepo ->getMsgById($_POST['id']);
    //Set du Commentaire
    $msgById ->setComment($_POST['comment']);
    //Update du comment
    $updateComment = $adminRep->updateComment($msgById);
}

//DELETE 
if ( isset ($_POST['delete']) ) {
    $adminRep = new AdminRepository();
    $msgById = $messageRepo ->getMsgById($_POST['id']);
    $deleteMessage = $adminRep ->deleteLine($msgById);
}
//Pour Affichage
$messages = $messageRepo->listMessages();

require 'admin/view/admin-home.phtml'; 