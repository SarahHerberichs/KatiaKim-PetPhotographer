<?php

class PhotoRepository {
  private PDO $_connexion;

  public function __construct() {
    $this ->_connexion = DataBase::getConnexion();
  }

  public function createPhoto (Photo $photo) : Photo {
    $stmt = $this->_connexion->prepare('
      INSERT INTO Photos (id, photo, name , article_id)
      VALUES (UUID(), :photo, :name, :article_id);
    '); 
    $stmt->bindValue ('photo', $photo->getPhoto());
    $stmt->bindValue ('name', $photo->getName());
    $stmt->bindValue ('article_id', $photo->getArticleId());

    $stmt->execute();
    return $photo;
  }
    
  public function listPhotosByArticle($articleId): array {
    $stmt = $this->_connexion->prepare('
      SELECT Photos.photo as PhotosFromPhotoTable, Article.name as ArticleName , Article.id as ArticleId ,Photos.id as PhotoId
      FROM Photos
      JOIN Article on Article.id = Photos.article_id
      WHERE Photos.article_id = :articleId
    ');
    $stmt->bindValue ('articleId', $articleId);
  
    $stmt->execute();
  
    $photosByArt= [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $photo = new Photo();
      /* TST */
      $photo ->setId($row['PhotoId']);
      /* */
      $photo ->setPhoto($row['PhotosFromPhotoTable']);
      $photo ->setArticleId($row['ArticleId']);
      $photo ->setArticleName($row['ArticleName']);
      array_push($photosByArt, $photo);
    }
    return $photosByArt;
  }
//Delete une des Photos d'un article
  public function deletePhoto (string $photoId, string $articleId) {
    $stmt = $this->_connexion->prepare('
      DELETE FROM Photos
      WHERE Photos.id = :photoId
      AND Photos.article_id = :articleId
    '); 
    $stmt->bindValue (':photoId', $photoId);
    $stmt->bindValue (':articleId', $articleId);

    $stmt->execute();

  }
}