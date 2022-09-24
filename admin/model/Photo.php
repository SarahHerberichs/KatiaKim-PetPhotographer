<?php
class Photo {
    private string $_id;
    private string $_name;
    private string $_photo = "";
    private string $_article_id ;
    

    public function setId($id): void {
        $this ->_id = $id;
    }
    
    public function setName(string $name): string {
        if (empty ($name)){
            return "Entrez un Titre de photo";
        }
        else {
            $this->_name = $name;
            return "";
        }
    }
    public function setPhoto(string $photo): string {
        if (empty ($photo)) {
            return "renseignez une photo";
        }
        else {
            $this ->_photo = $photo;
            return "";
        }
        $this ->_photo = $photo;
    }
    public function setArticleId(string $article_id): string {
        if (empty ($article_id)) {
            return "Selectionnez un article";
        }
        else {
            $this ->_article_id = $article_id;
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
 //   public function getGalleryId(): string {
   //     return $this ->_gallery_id;
   // }
    public function setArticleName(string $articleName): void{
        $this ->_articleName = $galleryName;
    }
    public function getArticleName(): string {
        return $this ->_articleName;
    }
}