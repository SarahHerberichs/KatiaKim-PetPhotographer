<?php
/*
class PhotoRepo {
    private PDO $_connexion;

    public function __construct() {
      $this ->_connexion = DataBase::getConnexion();
    }
    public function listPhotosByArticle($articleId): array {
        $stmt = $this->_connexion->prepare('
        SELECT * , Article.name as articleName
        FROM Photos
        JOIN Article on Article.id = Photos.article_id
        Where Photos.article_id = :articleId
        ');
        $stmt->bindValue('articleId', $articleId);
    
        $stmt->execute();
    
        $photosByArt= [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          $photo = new Photo();
          $photo ->setName($row['name']);
          $photo ->setPhoto($row['photo']);
          $photo ->setId($row['id']);
          $photo ->setArticleId($row['article_id']);
          $photo ->setArticleName($row['articleName']);
          array_push($photosByArt, $photo);
        }
        return $photosByArt;
      }
      public function createPhoto (Photo $photo) : Photo {

        $stmt = $this->_connexion->prepare('
          INSERT INTO Photos (
            id, photo, name , article_id
          ) VALUES (
            UUID(), :photo, :name, :article_id
          );
        ');
        
        $stmt->bindValue ('photo', $photo->getPhoto());
        $stmt->bindValue ('name', $photo->getName());
        $stmt->bindValue ('article_id', $photo->getArticleId());
  
        $stmt->execute();
        return $photo;
      }
    
}
*/