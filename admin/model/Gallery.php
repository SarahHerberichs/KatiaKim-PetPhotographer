<?php
class Gallery {
    private string $_id;
    private string $_name;

    public function setId(string $id): void {
        $this ->_id = $id;
    }
    public function setName(string $name): void {
        $this ->_name = $name;
    }
    public function getId(): string {
        return $this ->_id;
    }
    public function getName(): string {
        return $this ->_name;
    }
}