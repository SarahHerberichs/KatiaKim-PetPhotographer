<?php
/*----------------------------------------------------------------------------------------------------------------------*/
/*----------------------------------------------FORMULAIRE DE CONTACT-------------------------------------------------- */
/*----------------------------------------------------------------------------------------------------------------------*/

$messageRepository = new MessageRepository();
//Caractères autorisés pour format phone
$validNumbers = ["+","0","1","2","3","4","5","6","7","8","9"];

$userMessages = [
    'sendSuccess' => '',
    'requiredFirstName' => '',
    'requiredLastName' => '',
    'requiredPhone' => '',
    'requiredEmail' => '',
    'requiredMessage' => '',
    'onlyNumber' => '',
    'problemOnSubmit' => '',
];

//Si formulaire de contact soumis, instanciation d'un Message pour set les elements (+ msg erreur eventuel)
if ( isset ($_POST['sendMessageSubmit']) ) {
    
    $message = new Message();
    //Formats phone acceptés
    $validNumbers = ["+","0","1","2","3","4","5","6","7","8","9"];
    
    //Prénom 
    $userMessages['requiredFirstName'] = $message ->setFirstName ( htmlentities($_POST['firstName']) );

    //Nom
    $userMessages['requiredLastName'] = $message ->setLastName ( htmlentities($_POST['lastName']) );
    //Phone + Control format
    $userMessages['requiredPhone'] = $message ->setPhone( htmlentities($_POST['phone']) );
    $submitNumberSplit=str_split($_POST['phone']);
    
    for ($i = 0; $i< count($submitNumberSplit); $i++) {
        if ($userMessages['requiredPhone'] === "" && (!in_array($submitNumberSplit[$i], $validNumbers))) {
            $userMessages['onlyNumber'] = "wrong phone number";
        }; 
    }
   //Mail
    $userMessages['requiredEmail'] = $message ->setEmail( htmlentities($_POST['eMail']) );
    //Message
    $userMessages['requiredMessage'] =$message ->setMessage( htmlentities($_POST['message']) );
    // SI MSG ERREURS VIDES
    if (
        empty($userMessages['requiredFirstName']) &&
        empty($userMessages['requiredLastName']) &&
        empty($userMessages['requiredPhone']) &&
        empty($userMessages['requiredEmail']) &&
        empty($userMessages['requiredMessage']) &&
        empty($userMessages['onlyNumber'])  &&
        empty($userMessages['problemOnSubmit'])
    ) {
        //Insertion du message dans BDD et envoi msg de validation
        $messageRepository->createMessage($message);
        $userMessages['sendSuccess'] = 'Thanks for your message !';
    } else {
        //Envoi msg Erreur
        $userMessages['problemOnSubmit'] = 'Try Again - Problem with the form ';
    }
}
require 'view/contact.phtml';

?>
