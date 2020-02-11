<?php

class CarManager
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
     * @param Car $carL'instance d'Attribue à enregistrer.
     */
    public function addCar($car)
    {
        $req = $this->db->prepare(
            'INSERT INTO car(CAR_ID,CAR_MILAGE,CAR_COLOR,CAR_PRICE,CAR_DESCRIPTION,MODEL_ID)
            VALUES (:carId,:carMilage,:carColor,:carPrice,:carDescription,:carDescription)');
        $req->bindValue(':carId', $car->getCarId(), PDO::PARAM_STR);
        $req->bindValue(':carMilage', $car->getCarMilage(), PDO::PARAM_STR);
        $req->bindValue(':carColor', $car->getCarColor(), PDO::PARAM_STR);
        $req->bindValue(':carPrice', $car->getCarPrice(), PDO::PARAM_STR);
        $req->bindValue(':carDescription', $car->getCarDescription(), PDO::PARAM_STR);
        $req->bindValue(':carDescription', $car->getModelId(), PDO::PARAM_STR);
        $req->execute();
    }


    public function getAllCars()
    {
      $carList = array();
      $req = $this->db->prepare("SELECT CAR_ID,CAR_MILAGE,CAR_COLOR,CAR_PRICE,CAR_DESCRIPTION,MODEL_ID FROM car");
      $req->execute();
      while ($car = $req->fetch(PDO::FETCH_OBJ)) {
          $carList[] = new Car($car);
      };
      $req->closeCursor();
      return $carList;
    }


    /**
     * Retourne une instance d'Attribue à partir de son idUtilisateur et son idSujet.
     * @param integer $idUtilisateur L'id de l'Utilisateur de l'Attribue à récupérer.
     * @param integer $idSujet L'id du Sujet de l'Attribue à récupérer.
     * @return Attribue Une instance d'Attribue correspondant aux paramètres spécifiés.
     */
    public function getCarById($carId)
    {
        $req = $this->db->prepare(
            'SELECT CAR_ID,CAR_MILAGE,CAR_COLOR,CAR_PRICE,CAR_DESCRIPTION,MODEL_ID FROM car WHERE CAR_ID = :carId'
        );
        $req->bindValue(':carId', $carId, PDO::PARAM_STR);
        $req->execute();
        $car = new Car($req->fetch(PDO::FETCH_OBJ));
        $req->closeCursor();
        return $car;
    }

    public function deleteCarById($carId) {
      $req = $this->db->prepare("DELETE FROM car WHERE BRAND_ID = :carId");
      $req->bindValue(':carId', $carId, PDO::PARAM_STR);
      $req->execute();
      $req->closeCursor();
    }


}

?>
