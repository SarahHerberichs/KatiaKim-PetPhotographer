<?php
//set et get des elts d'un Message + gestion des msg d'erreurs
class Message {
    private string $_id;
    private string $_firstName;
    private string $_lastName;
    private string $_phone;
    private string $_email;
    private string $_message;
    private string $_date;
    private string $_comment;

    public function pushInArray () {
        return [
            'id' => $this ->getId(),
            'firstName' => $this ->getFirstName(),
            'lastName' => $this ->getLastName(),
            'phone' => $this ->getPhone(),
            'email' => $this ->getEmail(),
            'message' => $this ->getMessage(),
            'date' => $this ->getDate(),
            'comment' => $this ->getComment(),
        ];
    }
    public function setId($id): void {
        $this ->_id = $id;
    }
    public function setFirstName(string $firstName): string {
        if (empty($firstName)) {
            return "Entrez votre prenom";
        }
        else {
            $this ->_firstName = $firstName;
            return "";
        }

    }
    public function setLastName(string $lastName): string {
        if (empty($lastName)) {
            return "Entrez votre nom";
        }
        else {
            $this ->_lastName = $lastName;
            return "";
        }
    }
    public function setPhone(string $phone): string {
        if (empty($phone)) {
            return "Entrez votre telephone";
        }
        else {
            $this ->_phone = $phone;
            return "";
        }
    }
    public function setEmail(string $email): string {
        if (empty ($email)) {
            return "Entrez votre email";
        }
        else {
            $this ->_email = $email;
            return "";
        }
    }
    public function setMessage(string $message): string {
        if (empty ($message)) {
            return "Votre message est tout vide!";
        }
        else {
            $this ->_message = $message;
            return "";
        }
    }
    public function setDate(string $date): void {
            $this ->_date = $date;
    }
    public function setComment(string $comment): void {
        $this ->_comment = $comment;
    }
    public function getId(): string {
        return $this ->_id;
    }
    public function getFirstName(): string {
        return $this ->_firstName;
    }
    public function getLastName(): string {
        return $this ->_lastName;
    }
    public function getPhone(): string {
        return $this ->_phone;
    }
    public function getEmail(): string {
        return $this ->_email;
    }
    public function getMessage(): string {
        return $this ->_message;
    }
    public function getDate(): string {
        return $this ->_date;
    }
    public function getComment(): string {
        return $this ->_comment;
    }
}


