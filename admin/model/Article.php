<?php
class Article {
    private string $_id;
    private string $_name;
    private string $_photo = "";
    private string $_gallery_id ;

    public function setId($id): void {
        $this ->_id = $id;
    }
    
    public function setName(string $name): string {
        if (empty ($name)){
            return "Entrez un Titre d'article";
        }
        else {
            $this->_name = $name;
            return "";
        }
    }
    public function setPhoto(string $photo): string {
        if (empty ($photo)) {
            return "renseigner une photo";
        }
        else {
            $this ->_photo = $photo;
            return "";
        }
        $this ->_photo = $photo;
    }
    public function setGalleryId(string $gallery_id): string {
        if (empty ($gallery_id)) {
            return "Selectionnez une gallery";
        }
        else {
            $this ->_gallery_id = $gallery_id;
            return "";
        }
    }
    public function getId(): string {
        return $this ->_id;
    }
    public function getName(): string {
        return $this ->_name;
    }
    public function getPhoto(): string {
        return $this ->_photo;
    }
    public function getGalleryId(): string {
        return $this ->_gallery_id;
    }
}