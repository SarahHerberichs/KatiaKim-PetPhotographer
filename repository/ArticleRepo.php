<?php

class ArticleRepo {
    private PDO $_connexion;

    public function __construct() {
      $this ->_connexion = DataBase::getConnexion();
    }
    //sort la list des articles+ le nom de la gallery associé + la list des photos associés
    public function listArticlesByGallery(string $galleryName): array {
      $stmt = $this->_connexion->prepare('
      SELECT Article.name ,Article.id as ArticleId, Article.photo, Article.gallery_id, Gallery.name as galleryName
      FROM Article
      JOIN Gallery ON Gallery.id = Article.gallery_id
      WHERE Gallery.name= :galleryname
      ORDER BY galleryName;
   ');
   $stmt ->bindValue ('galleryname', $galleryName);
   $stmt->execute();

   $articles= [];
   while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
     $article = new Article();
     $photoRepo = new PhotoRepository();
     $article->setId($row['ArticleId']);
     $article->setPhoto($row['photo']);
     $article->setName($row['name']);
     $article->setGalleryId($row['gallery_id']);
     $article->setGalleryName($row['galleryName']);
     $article->setPhotoList($photoRepo->listPhotosByArticle($row['ArticleId']));
     array_push($articles, $article); 
   }
   return $articles;
    }
}