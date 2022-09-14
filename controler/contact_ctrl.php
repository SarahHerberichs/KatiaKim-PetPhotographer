<?php
$messageRepository = new MessageRepository();
$userMessages = [
    'sendSuccess' => '',
    'requiredFirstName' => '',
    'requiredLastName' => '',
    'requiredPhone' => '',
    'requiredEmail' => '',
    'requiredMessage' => '',
    'loginFail' => '',
];
//si formulaire de contact soumis, instanciation d'un Message pour set les elements
if ( isset ($_POST['sendMessageSubmit']) ) {
    $message = new Message();

    $userMessages['requiredFirstName'] = 
    $message ->setFirstName (
        htmlentities($_POST['firstName'])
    );
    $userMessages['requiredLastName'] =
    $message ->setLastName (
        htmlentities($_POST['lastName'])
    );
    $userMessages['requiredPhone'] =
    $message ->setPhone(
        htmlentities($_POST['phone'])
    );
    $userMessages['requiredEmail'] =
    $message ->setEmail(
        htmlentities($_POST['eMail'])
    );
    $userMessages['requiredMessage'] =
    $message ->setMessage(
        htmlentities($_POST['message'])
    );
    // si les msg d'erreurs sont vides
    if (
        empty($userMessages['requiredFirstName']) &&
        empty($userMessages['requiredLastName']) &&
        empty($userMessages['requiredPhone']) &&
        empty($userMessages['requiredEmail']) &&
        empty($userMessages['requiredMessage'])
    )
    {
        //insertion du message sété dans la BDD et envoi msg de validation
        $messageRepository->createMessage($message);
        $userMessages['sendSuccess'] = 'Message bien envoyé';
    }
}
require 'view/contact/contact.phtml';

?>
