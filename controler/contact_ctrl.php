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

if (isset ($_POST['sendMessageSubmit'])){
    $message= new Message();

    $userMessages['requiredFirstName']= 
    $message->setFirstName(
        htmlentities($_POST['firstName'])
    );
    $userMessages['requiredLastName']=
    $message->setLastName(
        htmlentities($_POST['lastName'])
    );
    $userMessages['requiredPhone']=
    $message->setPhone(
        htmlentities($_POST['phone'])
    );
    $userMessages['requiredEmail']=
    $message->setEmail(
        htmlentities($_POST['eMail'])
    );
    $userMessages['requiredMessage']=
    $message->setMessage(
        htmlentities($_POST['message'])
    );

if (
    empty($userMessages['requiredFirstName'])&&
    empty($userMessages['requiredLastName'])&&
    empty($userMessages['requiredPhone'])&&
    empty($userMessages['requiredEmail'])&&
    empty($userMessages['requiredMessage'])
)
    {
        $messageRepository->createMessage($message);
        $userMessages['sendSuccess']= 'Message bien envoyé';
    }
}
require 'view/contact/contact.phtml';

?>
