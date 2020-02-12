<?php
class User {
  private $userId;
  private $userUsername;
  private $userPassword;
  private $userName;

  /**
  * Retourne une nouvelle instance d'Attribue.
  * @param array $valeurs Un tableau associatif contenant les données à associer à cette instance.
  */
  public function __construct($data = array())
  {
    if (!empty($data)) {
      $this->affect($data);
    }
  }

  /**
  * Associe les données d'un tableau associatif à cette instance de Attribue.
  * @param array $data Un tableau associatif contenant des données à associer à cette instance.
  */
  public function affect($data)
  {
    foreach ((array)$data as $attribut => $value) {
      switch ($attribut) {

        case 'USER_ID':
        $this->setUserId($value);
        break;

        case 'USER_USERNAME':
        $this->setUserUsername($value);
        break;

        case 'USER_PASSWORD':
        $this->setUserPassword($value);
        break;

        case 'USER_NAMED':
        $this->setUserName($value);
        break;

        default:
        break;
      }
    }
  }

  /**
  * Retourne l'ID de l'Utilisateur attribué à cette instance.
  * @return integer L'ID de l'Utilisateur attribué à cette instance.
  */
  public function getUserId()
  {
    return $this->userId;
  }

  /**
  * Retourne l'ID du Sujet attribué à cette instance.
  * @return integer L'ID du Sujet attribué à cette instance.
  */
  public function getUserUsername()
  {
    return $this->userUsername;
  }

  /**
  * Retourne la date d'attribution du sujet au sujet de cette instance.
  * @return string La date d'attribution du sujet au sujet de cette instance.
  */
  public function getUserPassword()
  {
    return $this->userPassword;
  }

  /**
  * Retourne la date d'attribution du sujet au sujet de cette instance.
  * @return string La date d'attribution du sujet au sujet de cette instance.
  */
  public function getUserName()
  {
    return $this->userName;
  }

  /**
  * Modifie l'ID de l'Utilisateur attribué à cette instance.
  * @param integer $valeur Le nouvel ID de l'Utilisateur attribué à cette instance.
  */
  public function setUserId($value)
  {
    $this->userId = $value;
  }

  /**
  * Modifie l'ID du Sujet attribué à cette instance.
  * @param integer $valeur Le nouvel ID du Sujet attribué à cette instance.
  */
  public function setUserUsername($value)
  {
    $this->userUsername = $value;
  }

  /**
  * Modifie la date d'attribution du sujet de cette instance.
  * @param string $valeur La nouvelle date d'attribution du sujet de cette instance.
  */
  public function setUserPassword($value)
  {
    $this->userPassword = $value;
  }

  /**
  * Modifie la date d'attribution du sujet de cette instance.
  * @param string $valeur La nouvelle date d'attribution du sujet de cette instance.
  */
  public function setUserName($value)
  {
    $this->userName = $value;
  }

  /**
  * Hash et chiffre le mot de passe avec l'algorithme ARGON2I.
  * @param string $motDePasse - Le mot de passe en clair à chiffrer.
  * @return string Le mot de passe une fois hashé et chiffré.
  */
  function hashPassword($password){
    return password_hash($password, PASSWORD_ARGON2I);
  }

  /**
  * Retourne si le mot de passe saisi est le même que le mot de passe actuel de cette instance.
  * @param string $mdpSaisi Le mot de passe saisi par l'Utilisateur.
  * @return bool true si les mots de passes correspondent, false dans les autres cas.
  */
  public function checkPassword($plainPassword)
  {
    return password_verify($plainPassword, $this->getUserPassword());
  }
}
?>
