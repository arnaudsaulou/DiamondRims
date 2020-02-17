<?php

class UserManager
{
  private $db;

  /**
  * Retourne une nouvelle instance d'AttribueManager.
  * @param MyPDO $db Une instance de MyPDO.
  */
  public function __construct($db)
  {
    $this->db = $db;
  }

  /**
  * Stocke un Attribue dans la base de données.
  * @param User $user L'instance d'Attribue à enregistrer.
  */
  public function addUser($user)
  {
    $req = $this->db->prepare(
      'INSERT INTO user(USER_ID,USER_USERNAME,USER_PASSWORD,USER_NAME)
      VALUES (:userId,:userUsername,:userPassword,:userName)');
      $req->bindValue(':userId', $user->getUserId(), PDO::PARAM_STR);
      $req->bindValue(':userUsername', $user->getUserUsername(), PDO::PARAM_STR);
      $req->bindValue(':userPassword', $user->getUserPassword(), PDO::PARAM_STR);
      $req->bindValue(':userName', $user->getUserName(), PDO::PARAM_STR);
      $req->execute();
    }


    public function getAllUsers()
    {
      $userList = array();
      $req = $this->db->prepare("SELECT USER_ID,USER_USERNAME,USER_PASSWORD,USER_NAME FROM user");
      $req->execute();
      while ($user = $req->fetch(PDO::FETCH_OBJ)) {
        $userList[] = new User($user);
      };
      $req->closeCursor();
      return $userList;
    }


    /**
    * Retourne une instance d'Attribue à partir de son idUtilisateur et son idSujet.
    * @param integer $idUtilisateur L'id de l'Utilisateur de l'Attribue à récupérer.
    * @param integer $idSujet L'id du Sujet de l'Attribue à récupérer.
    * @return Attribue Une instance d'Attribue correspondant aux paramètres spécifiés.
    */
    public function getUserByUsername($username)
    {
      $req = $this->db->prepare(
        'SELECT USER_ID,USER_USERNAME,USER_PASSWORD,USER_NAME FROM user WHERE USER_USERNAME= :username'
      );
      $req->bindValue(':username', $username, PDO::PARAM_STR);
      $req->execute();
      $user = new User($req->fetch(PDO::FETCH_OBJ));
      $req->closeCursor();
      return $user;
    }
  

    public function deleteUserById($userId) {
      $req = $this->db->prepare("DELETE FROM user WHERE USER_ID = :userId");
      $req->bindValue(':userId', $userId, PDO::PARAM_STR);
      $req->execute();
      $req->closeCursor();
    }


  }

  ?>
