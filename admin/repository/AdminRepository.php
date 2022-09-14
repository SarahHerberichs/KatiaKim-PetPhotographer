<?php 

/* Select de toute la table admin a partir de AdminCredentials (get et set des elts)
*/

class AdminRepository {
  private PDO $_connexion;

  public function __construct() {
    $this->_connexion = DataBase::getConnexion();
  }
    public function retrieveAdminLoginDatas() {
        $stmt = $this->_connexion->prepare('
          SELECT *
            FROM admin
        ');
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if (!$result) {
          return null;
        }
    /*Application des champs trouvés a AdminCredentials pour set les elts */
        $admin = new AdminCredentials();
        $admin->setId($result['id']);
        $admin->setLogin($result['login']);
        $admin->setPassword($result['password']);
        
        return $admin;
      }
      //update un comment a partir d'un message
      public function updateComment (Message $message) {
        $stmt = $this->_connexion->prepare('
          UPDATE contact
          SET comment = :comment
          WHERE id= :id 
      ');
      $stmt->bindValue('comment', $message->getComment());
      $stmt->bindValue('id', $message->getId());
      $stmt->execute();
      return $message;
      }
    }    
    