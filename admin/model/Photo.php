<?php
class Photo {
    private string $_id;
    private string $_name;
    private string $_photo = "";
    private string $_article_id ;
    private string $_article_name;
    

    public function setId(string $id): void {
        $this ->_id = $id;
    }

    public function setName(string $name): void {
        $this ->_name = $name;
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

    public function setArticleId(string $article_id): void {
        $this ->_article_id = $article_id;
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

    public function getArticleId(): string {
        return $this ->_article_id;
    }

    public function setArticleName(string $article_name): void{
        $this ->_article_name = $article_name;
    }
    
    public function getArticleName(): string {
        return $this ->_article_name; 
    }
}
