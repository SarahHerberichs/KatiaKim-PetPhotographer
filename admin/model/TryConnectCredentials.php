<?php
/*-------------------------------------------------------------------------------------------*/
/*--------------------------VERIFICATIONS TENTATIVE DE CONNEXION---------------------------- */
/*-------------------------------------------------------------------------------------------*/

class TryConnectCredentials {   
  private string $_login;
  private string $_password;

  //set et hash le password entré par l'admin
  public function setPassword(string $password): string {
    if (!empty($password)) {
      $this ->_password = hash('sha256', $password);
      return '';
    }
    return 'Please, insert your password';
  }

  // set le login entré par l'admin
  public function setLogin(string $login): string {
    if (!empty($login)) {
      $this ->_login = $login;
      return '';
    }
    return 'Please, insert your loggin';
  }

  //Méthode de Verification de l'identité (pwd Réel en parametre) comparé avec pwd entré
  public function isValidPassword(string $accountPassword): bool {
    return $this ->_password === $accountPassword;
  }
  //Méthode de Verification de l'identité (loggin Réel en parametre) comparé avec login entré
  public function isValidLogin(string $accountLogin): bool {
    return $this ->_login === $accountLogin;
  }
  
  public function getLogin(): string {
    return $this ->_login;
  } 
  public function getPassword(): string {
    return $this ->_password;
  }
}
