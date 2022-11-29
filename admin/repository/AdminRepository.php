<?php 

class AdminRepository {
  private PDO $_connexion;

  public function __construct() {
    $this ->_connexion = DataBase::getConnexion();
  }

  //retrouve et stocke les identifiants de la table admin BDD
  public function retrieveAdminLoginDatas(): AdminCredentials {
    $stmt = $this->_connexion->prepare('
      SELECT *
      FROM admin
    ');
    $stmt ->execute();

    $result = $stmt ->fetch(PDO::FETCH_ASSOC);
    //Si rien trouvé, retourne null
    if (!$result) {
      return null;
    }
    //SI RESULTAT
    /*Instanciation d'AdminCredentials pour set les elts */
    $admin = new AdminCredentials();
    $admin ->setId($result['id']);
    $admin ->setLogin($result['login']);
    $admin ->setPassword($result['password']);
    return $admin;
  }


  //Update un comment a partir d'un message
  public function updateComment (Message $message) {
    $stmt = $this ->_connexion->prepare('
      UPDATE contact
      SET comment = :comment
      WHERE id= :id 
    ');
    $stmt ->bindValue('comment', $message->getComment());
    $stmt ->bindValue('id', $message->getId());

    $stmt ->execute();
      
    return $message;
  }

  public function deleteLine (Message $message) {
    $stmt = $this ->_connexion->prepare ('
      DELETE 
      FROM contact
      WHERE id= :id
    ');
    $stmt ->bindValue('id', $message->getId());
    
    $stmt ->execute();
  }
}    
    
    