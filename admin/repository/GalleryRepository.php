<?php

class GalleryRepository {
    private PDO $_connexion;

    public function __construct() {
      $this ->_connexion = DataBase::getConnexion();
    }
    public function listGallery(): array {
        $stmt = $this->_connexion->prepare('
          SELECT * FROM Gallery
        ');
        $stmt ->execute();
    
        $gallerys = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          $gallery = new Gallery();
          $gallery ->setId($row['id']);
          $gallery ->setName($row['name']);
          array_push($gallerys, $gallery);
        }
        return $gallerys;
    }
}