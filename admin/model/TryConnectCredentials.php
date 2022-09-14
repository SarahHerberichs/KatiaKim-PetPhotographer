<?php
/* set et get des donnees de tentative de connection*/
class TryConnectCredentials {   
  private string $_login;
  private string $_password;

/* creer repository pour afficher table et faire lien dans autoload*/ 
  public function setPassword(string $password): string {
    if (!empty($password)) {
      $this->_password = hash('sha256', $password);
      return '';
    }
      return 'Veuillez renseigner votre mot de passe';
  }
  public function setLogin(string $login): string {
      if (!empty($login)) {
        $this->_login = $login;
        return '';
    }
        return 'Veuillez renseigner votre login';
  }
  public function isValidPassword(string $accountPassword): bool {
    return $this->_password === $accountPassword;
  }
  public function isValidLogin(string $accountLogin): bool {
    return $this->_login === $accountLogin;
  }
  public function getLogin(): string {
    return $this->_login;
  }
  public function getPassword(): string {
    return $this->_password;
  }
}
