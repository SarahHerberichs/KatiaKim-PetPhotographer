<?php

class ArticleRepository {
    private PDO $_connexion;

    public function __construct() {
      $this ->_connexion = DataBase::getConnexion();
    }
    public function createArticle (Article $article) : Article {

      $stmt = $this->_connexion->prepare('
        INSERT INTO Article (
          id, photo, name , gallery_id
        ) VALUES (
          UUID(), :photo, :name, :gallery_id
        );
      ');
 
      $stmt->bindValue ('photo', $article->getPhoto());
      $stmt->bindValue ('name', $article->getName());
      $stmt->bindValue ('gallery_id', $article->getGalleryId());

      $stmt->execute();
      return $article;
    }
    public function listArticles(): array {
      $stmt = $this->_connexion->prepare('
        SELECT * FROM Article
      ');
      $stmt->execute();
  
      $articles= [];
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $article = new Article();
        $article->setPhoto($row['photo']);
        $article->setName($row['name']);
        $article->setGalleryId($row['gallery_id']);
        array_push($articles, $article);
      }
      return $articles;
    }
}