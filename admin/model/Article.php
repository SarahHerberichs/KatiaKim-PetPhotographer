<?php
class Article {
    private string $_id;
    private string $_name;
    private string $_link;
    private string $_gallery_id;

    public function setId($id): void {
        $this ->_id = $id;
    }
    public function setName($name): void {
        $this ->_name = $name;
    }
    public function setLink($link): void {
        $this ->_link = $link;
    }
    public function setGallery($gallery): void {
        $this ->_gallery = $gallery;
    }
    public function getId(): string {
        return $this ->_id;
    }
    public function getName(): string {
        return $this ->_name;
    }
    public function getLink(): string {
        return $this ->_link;
    }
    public function getGallery(): string {
        return $this ->_gallery;
    }
}