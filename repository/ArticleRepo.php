<?php

class ArticleRepo {
    private PDO $_connexion;

    public function __construct() {
      $this ->_connexion = DataBase::getConnexion();
    }
    
    public function listArticlesByGallery(string $galleryName): array {
      $stmt = $this->_connexion->prepare('
      SELECT Article.photo as ArticlePhoto, Article.name as ArticleName,Article.id as ArticleId, Gallery.name as GalleryName
      FROM Article 
      INNER JOIN Gallery ON Article.gallery_id = Gallery.id
      WHERE Gallery.name  = :GalleryName ;
      ');
      $articleRepo=new ArticleRepository();
      $stmt->bindValue('GalleryName', $galleryName);
     
      $stmt->execute();
  
      $articles= [];
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
       
        $article = new Article();
        $article->setPhoto($row['ArticlePhoto']);
        $article->setName($row['ArticleName']);
        $article->setGalleryName($row['GalleryName']);
        $article->setId($row['ArticleId']);
        array_push($articles, $article);
      }
      return $articles;
    }
}