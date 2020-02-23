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
            'INSERT INTO picture(PICTURE_NUM, PICTURE_NAME, PICTURE_DESCRIPTION, CAR_ID)
            VALUES (:pictureNum,:pictureName,:pictureDescription,:carId)');
        $req->bindValue(':pictureNum', $picture->getPictureNum(), PDO::PARAM_STR);
        $req->bindValue(':pictureName', $picture->getPictureName(), PDO::PARAM_STR);
        $req->bindValue(':pictureDescription', $picture->getPictureDescription(), PDO::PARAM_STR);
        $req->bindValue(':carId', $picture->getCarId(), PDO::PARAM_STR);
        $req->execute();
    }

    public function getMainPictureByCarId($carId)
    {
      $pictureList = array();
      $req = $this->db->prepare("SELECT PICTURE_NUM, PICTURE_NAME, PICTURE_DESCRIPTION, CAR_ID
        FROM picture WHERE CAR_ID = :carId AND PICTURE_NUM = 1");
      $req->bindValue(':carId', $carId, PDO::PARAM_STR);
      $req->execute();
      $picture = new Picture($req->fetch(PDO::FETCH_OBJ));
      $req->closeCursor();
      return $picture;
    }


    public function getPicturesByCarId($carId)
    {
      $pictureList = array();
      $req = $this->db->prepare("SELECT PICTURE_NUM, PICTURE_NAME, PICTURE_DESCRIPTION, CAR_ID
        FROM picture WHERE CAR_ID = :carId");
      $req->bindValue(':carId', $carId, PDO::PARAM_STR);
      $req->execute();
      while ($picture = $req->fetch(PDO::FETCH_OBJ)) {
          $pictureList[] = new Picture($picture);
      };
      $req->closeCursor();
      return $pictureList;
    }


    public function updatePicture($updatedPicture)
    {
        $req = $this->db->prepare(
            'UPDATE picture SET PICTURE_NUM=:pictureNum,PICTURE_NAME=:pictureName,PICTURE_DESCRIPTION=:pictureDescription
            WHERE PICTURE_NUM=:pictureNum AND CAR_ID=:carId');
        $req->bindValue(':pictureNum', $updatedPicture->getPictureNum(), PDO::PARAM_STR);
        $req->bindValue(':pictureName', $updatedPicture->getPictureName(), PDO::PARAM_STR);
        $req->bindValue(':pictureDescription', $updatedPicture->getPictureDescription(), PDO::PARAM_STR);
        $req->bindValue(':carId', $updatedPicture->getCarId(), PDO::PARAM_STR);
        $req->execute();
    }

    public function deletePictureByCarId($carId)
    {
      $req = $this->db->prepare(
          'DELETE FROM picture WHERE CAR_ID=:carId');
      $req->bindValue(':carId', $carId, PDO::PARAM_STR);
      $req->execute();
    }

}

?>
