<?php

$messageRepo = new MessageRepository();
$messages = $messageRepo->listMessages();

//si le form est validé
if (isset($_POST['commentSubmit'])) {
    var_dump($_POST['id']);
    $adminRep=new AdminRepository();
    $setById=$messageRepo->setWhereId($_POST['id']);
    $setById->setComment($_POST['comment']);
    $updateComment=$adminRep->updateComment($setById);
}
require 'admin/view/adminHome.phtml'; 
