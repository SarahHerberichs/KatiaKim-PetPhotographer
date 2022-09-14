<?php 


class MessageRepository {
  private PDO $_connexion;

  public function __construct() {
    $this->_connexion = DataBase::getConnexion();
  }
  /*Insertion du message dans BDD */
  public function createMessage(Message $message) {
    $stmt = $this->_connexion->prepare('
        INSERT INTO contact (
          id, firstname, lastname, phone, mail , message , comment
        ) VALUES (
          UUID(), :firstName, :lastName, :phone, :mail, :message , ""
        );
    ');

    $stmt->bindValue('firstName', $message->getFirstName());
    $stmt->bindValue('lastName', $message->getLastName());
    $stmt->bindValue('phone', $message->getPhone());
    $stmt->bindValue('mail', $message->getEmail());
    $stmt->bindValue('message', $message->getMessage());
    $stmt->bindValue('comment',$message->getComment());


    $stmt->execute();
  }
  /*Push elements du message dans array*/
  public function listMessages(): array {
    $stmt = $this->_connexion->prepare('
      SELECT * FROM contact
    ');
    $stmt->execute();

    $messages = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $message = new Message();
      $message->setId($row['id']);
      $message->setFirstName($row['firstname']);
      $message->setLastName($row['lastname']);
      $message->setPhone($row['phone']);
      $message->setEmail($row['mail']);
      $message->setMessage($row['message']);
      $message->setDate($row['date']);
      $message->setComment($row['comment']);
      array_push($messages, $message);
    }
    return $messages;
  }

  /*selectionne tout dans contact la ou l'id = a celui en parametre*/
  public function setWhereId(String $id):Message {
    $stmt= $this->_connexion->prepare('
      SELECT * FROM contact 
      WHERE id = :id
    ');
    //id = celui du parametre
    $stmt->bindValue('id', $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $message = new Message();
    $message->setId($result['id']);
    $message->setComment($result['comment']);
    
  }
}
