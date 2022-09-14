<?php

$messageRepo = new MessageRepository();
/*Un array contenant tous les elts d'un msg*/
$messages = $messageRepo->listMessages();

if (isset($_POST['commentSubmit'])) {
    $adminRep=new AdminRepository();
    /*va sortir un Message qui contient l'id et le comment associé*/
    $setById=$messageRepo->setWhereId($_POST['id']);
    /*Set du comment a prendre en compte */
    $setById->setMessage(htmlentities($_POST['comment']));
   
    $updateComment=$adminRep->updateComment($setById);
}
require 'admin/view/adminHome.phtml'; 
