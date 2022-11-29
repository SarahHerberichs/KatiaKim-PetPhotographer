<?php
/*-------------------------------------------------------------------------------------------*/
/*--------------------------------IDENTIFIANTS REELS DE LA BDD------------------------------ */
/*-------------------------------------------------------------------------------------------*/
class AdminCredentials {
    private string $_id;
    private string $_login;
    private string $_password;

    public function setId($id): void {
        $this ->_id = $id;
    }
    public function setLogin($login): void {
        $this ->_login = $login;
    }
    public function setPassword($password): void {
        $this ->_password = $password;
    }
    public function getId(): string {
        return $this ->_id;
    }

    public function getLogin(): string {
        return $this ->_login;
    }

    public function getPassword(): string {
        return $this ->_password;
    }
}