<?php
//Methodes d'insetion d'article dans BDD à partir d'un article et de Liste
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
    
    $stmt ->bindValue ('photo', $article->getPhoto());
    $stmt ->bindValue ('name', $article->getName());
    $stmt ->bindValue ('gallery_id', $article->getGalleryId());

    $stmt ->execute();
    return $article;
  }

  public function listArticles(): array {
    $stmt = $this ->_connexion->prepare('
      SELECT Article.name as ArticleName ,Article.id as ArticleId, Article.photo as ArticleMainPhoto, 
      Article.gallery_id, Gallery.name as GalleryName
      FROM Article
      JOIN Gallery ON Gallery.id = Article.gallery_id
      ORDER BY galleryName;
    ');
    $stmt ->execute();
  
    $articles = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $photoRepo = new PhotoRepository();
      $article = new Article();
      $article ->setName($row['ArticleName']);
      $article ->setId($row['ArticleId']);
      $article ->setPhoto($row['ArticleMainPhoto']);
      $article ->setGalleryId($row['gallery_id']);
      $article ->setGalleryName($row['GalleryName']);
      $article ->setPhotoList($photoRepo->listPhotosByArticle($row['ArticleId']));

      array_push($articles, $article);
    }
    return $articles;
  }

  public function listArticlesByGallery(string $galleryName): array {
    $stmt = $this->_connexion->prepare('
      SELECT Article.name as ArticleName, Article.id as ArticleId, Article.photo as ArticleMainPhoto, Article.gallery_id, Gallery.name as GalleryName
      FROM Article
      JOIN Gallery ON Gallery.id = Article.gallery_id
      WHERE Gallery.name= :galleryname
      ORDER BY galleryName;
    ');
    $stmt->bindValue ('galleryname', $galleryName);
    $stmt->execute();

    $articles= [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $article = new Article();
      $photoRepo = new PhotoRepository();
      $article->setId($row['ArticleId']);
      $article->setPhoto($row['ArticleMainPhoto']);
      $article->setName($row['ArticleName']);
      $article->setGalleryId($row['gallery_id']);
      $article->setGalleryName($row['GalleryName']);
      $article->setPhotoList($photoRepo->listPhotosByArticle($row['ArticleId']));
      array_push($articles, $article); 
    }
    return $articles;
  }

  //Supprime l'article
  public function deleteArticle (string $id) {
    $stmt = $this->_connexion->prepare('
      DELETE FROM Photos
      WHERE Photos.article_id = :id;  
      DELETE FROM Article 
      WHERE Article.id = :id 
    ');
    $stmt ->bindValue (':id', $id);
    $stmt->execute();
  }
}