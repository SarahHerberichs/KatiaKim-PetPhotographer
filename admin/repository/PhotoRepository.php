<?php

class PhotoRepository {
    private PDO $_connexion;

    public function __construct() {
      $this ->_connexion = DataBase::getConnexion();
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
   /* public function listPhotos(): array {
      $stmt = $this->_connexion->prepare('
      SELECT * , Article.name as ArticleName
      FROM Photos
      JOIN Article ON Article.id = Photos.article_id
      ORDER BY Article.name
      ');
      $stmt->execute();
  
      $photos= [];
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $photo = new Photo();
        $photo ->setId($row['id']);
        $photo ->setPhoto($row['photo']);
        $photo ->setName($row['name']);
        $photo ->setArticleId($row['article_id']);
        $photo ->setArticleName($row['ArticleName']);
        array_push($photos, $photo);
      }
      return $photos;
    }
    */
    public function listPhotosByArticle($articleId): array {
      $stmt = $this->_connexion->prepare('
      SELECT *
      FROM Photos
      WHERE article_id = :articleId
      ');

      $stmt->bindValue ('articleId', $articleId);
      $stmt->execute();
  
      $photosByArticle= [];
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $photo = new Photo();
        $photo ->setId($row['id']);
        $photo ->setPhoto($row['photo']);
        $photo ->setName($row['name']);
        $photo ->setArticleId($row['article_id']);
        array_push($photosByArticle, $photo);
      }
      return $photosByArticle;
    }
   
}