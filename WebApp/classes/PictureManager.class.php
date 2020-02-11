<?php

class PictureManager
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
     * @param Picture $picture L'instance d'Attribue à enregistrer.
     */
    public function addPicture($picture)
    {
        $req = $this->db->prepare(
            'INSERT INTO picture(PICTURE_ID, PICTURE_NUM, PICTURE_DESCRIPTION, CAR_ID)
            VALUES (:pictureId,:pictureNum,:pictureDescription,:carId)');
        $req->bindValue(':pictureId', $picture->getPictureId(), PDO::PARAM_STR);
        $req->bindValue(':pictureNum', $picture->getPictureNum(), PDO::PARAM_STR);
        $req->bindValue(':pictureDescription', $picture->getPictureDescription(), PDO::PARAM_STR);
        $req->bindValue(':carId', $picture->getCarId(), PDO::PARAM_STR);
        $req->execute();
    }

    public function getMainPictureByCarId($carId)
    {
      $pictureList = array();
      $req = $this->db->prepare("SELECT PICTURE_ID, PICTURE_NUM, PICTURE_DESCRIPTION, CAR_ID FROM picture WHERE CAR_ID = :carId AND PICTURE_NUM = 1");
      $req->bindValue(':carId', $carId, PDO::PARAM_STR);
      $req->execute();
      $picture = new Picture($req->fetch(PDO::FETCH_OBJ));
      $req->closeCursor();
      return $picture;
    }


    public function getPicturesByCarId($carId)
    {
      $pictureList = array();
      $req = $this->db->prepare("SELECT PICTURE_ID, PICTURE_NUM, PICTURE_DESCRIPTION, CAR_ID FROM picture WHERE CAR_ID = :carId");
      $req->bindValue(':carId', $carId, PDO::PARAM_STR);
      $req->execute();
      while ($picture = $req->fetch(PDO::FETCH_OBJ)) {
          $modelList[] = new Picture($picture);
      };
      $req->closeCursor();
      return $pictureList;
    }


    /**
     * Retourne une instance d'Attribue à partir de son idUtilisateur et son idSujet.
     * @param integer $idUtilisateur L'id de l'Utilisateur de l'Attribue à récupérer.
     * @param integer $idSujet L'id du Sujet de l'Attribue à récupérer.
     * @return Attribue Une instance d'Attribue correspondant aux paramètres spécifiés.
     */
    public function getPictureById($pictureId)
    {
        $req = $this->db->prepare(
            'SELECT PICTURE_ID, PICTURE_NUM, PICTURE_DESCRIPTION, CAR_ID FROM picture WHERE PICTURE_ID = :pictureId'
        );
        $req->bindValue(':pictureId', $pictureId, PDO::PARAM_STR);
        $req->execute();
        $picture = new Picture($req->fetch(PDO::FETCH_OBJ));
        $req->closeCursor();
        return $picture;
    }

    public function deletePictureById($pictureId) {
      $req = $this->db->prepare("DELETE FROM picture WHERE PICTURE_ID = :pictureId");
      $req->bindValue(':pictureId', $pictureId, PDO::PARAM_STR);
      $req->execute();
      $req->closeCursor();
    }

}

?>
