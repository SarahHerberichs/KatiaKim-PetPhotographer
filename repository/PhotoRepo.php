<?php

class PhotoRepo {
    private PDO $_connexion;

    public function __construct() {
      $this ->_connexion = DataBase::getConnexion();
    }
    public function listPhotosByArticle($articleId): array {
        $stmt = $this->_connexion->prepare('
        SELECT * 
        FROM Photos
        Where Photos.article_id = :articleId
        ');
        $stmt->bindValue('articleId', $articleId);
    
        $stmt->execute();
    
        $photosByArt= [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          $photoByArt = new Photo();
          $photoByArt ->setName($row['name']);
          $photoByArt ->setPhoto($row['photo']);
          $photoByArt ->setId($row['id']);
          $photoByArt ->setArticleId($row['article_id']);
          array_push($photosByArt, $photoByArt);
        }
        return $photosByArt;
        
     
      }
    
}