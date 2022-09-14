<?php
/* set et get des donnees de tentative de connection*/
// + gestion des msg d'erreurs
class TryConnectCredentials {   
private string $_login;
private string $_password;

//set et hash le pwd
  public function setPassword(string $password): string {
    if (!empty($password)) {
        $this ->_password = hash('sha256', $password);
        return '';
    }
    return 'Veuillez renseigner votre mot de passe';
  }

  public function setLogin(string $login): string {
    if (!empty($login)) {
        $this ->_login = $login;
        return '';
    }
    return 'Veuillez renseigner votre login';
    }
    //function de validation de l'identité
  public function isValidPassword(string $accountPassword): bool {
    return $this ->_password === $accountPassword;
  }
  public function isValidLogin(string $accountLogin): bool {
    return $this ->_login === $accountLogin;
  }
  //
  public function getLogin(): string {
    return $this ->_login;
  } 
  public function getPassword(): string {
    return $this ->_password;
  }
}
