<?php

class CarManager
{
  private $db;
  private $lastInsertId;

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
      'INSERT INTO car(CAR_MILAGE,CAR_COLOR,CAR_PRICE,CAR_DESCRIPTION,MODEL_ID)
      VALUES (:carMilage,:carColor,:carPrice,:carDescription,:modelId)');
      $req->bindValue(':carMilage', $car->getCarMilage(), PDO::PARAM_STR);
      $req->bindValue(':carColor', $car->getCarColor(), PDO::PARAM_STR);
      $req->bindValue(':carPrice', $car->getCarPrice(), PDO::PARAM_STR);
      $req->bindValue(':carDescription', $car->getCarDescription(), PDO::PARAM_STR);
      $req->bindValue(':modelId', $car->getModelId(), PDO::PARAM_STR);
      $req->execute();
      $this->lastInsertId = $this->db->lastInsertId();
    }


    public function updateCar($updatedCar)
    {
      $req = $this->db->prepare(
        'UPDATE car SET CAR_MILAGE=:carMilage,CAR_COLOR=:carColor,CAR_PRICE=:carPrice,CAR_DESCRIPTION=:carDescription,MODEL_ID=:modelId
        WHERE CAR_ID = :carId');
        $req->bindValue(':carMilage', $updatedCar->getCarMilage(), PDO::PARAM_STR);
        $req->bindValue(':carColor', $updatedCar->getCarColor(), PDO::PARAM_STR);
        $req->bindValue(':carPrice', $updatedCar->getCarPrice(), PDO::PARAM_STR);
        $req->bindValue(':carDescription', $updatedCar->getCarDescription(), PDO::PARAM_STR);
        $req->bindValue(':modelId', $updatedCar->getModelId(), PDO::PARAM_STR);
        $req->bindValue(':carId', $updatedCar->getCarId(), PDO::PARAM_STR);
        $req->execute();
      }

      public function getAllCars()
      {
        $carList = array();
        $req = $this->db->prepare(
          'SELECT CAR_ID,CAR_MILAGE,CAR_COLOR,CAR_PRICE,CAR_DESCRIPTION,MODEL_ID FROM car'
        );
        $req->execute();
        while ($car = $req->fetch(PDO::FETCH_OBJ)) {
          $carList[] = new Car($car);
        };
        $req->closeCursor();
        return $carList;
      }

    public function getAllCarsByModel($modelId)
    {
      $carList = array();
      $req = $this->db->prepare(
        'SELECT CAR_ID,CAR_MILAGE,CAR_COLOR,CAR_PRICE,CAR_DESCRIPTION,MODEL_ID FROM car WHERE MODEL_ID = :modelId '
      );
      $req->bindValue(':modelId', $modelId, PDO::PARAM_STR);
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


    /**
    * Retourne une instance d'Attribue à partir de son idUtilisateur et son idSujet.
    * @param integer $idUtilisateur L'id de l'Utilisateur de l'Attribue à récupérer.
    * @param integer $idSujet L'id du Sujet de l'Attribue à récupérer.
    * @return Attribue Une instance d'Attribue correspondant aux paramètres spécifiés.
    */
    public function getCarsByBrand($brandId)
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


    /**
    * Retourne une instance d'Attribue à partir de son idUtilisateur et son idSujet.
    * @param integer $idUtilisateur L'id de l'Utilisateur de l'Attribue à récupérer.
    * @param integer $idSujet L'id du Sujet de l'Attribue à récupérer.
    * @return Attribue Une instance d'Attribue correspondant aux paramètres spécifiés.
    */
    public function getCarsWithFilter($filterArray)
    {
      $nbArgs = len($filterArray);

      switch ($nbArgs) {
        case 1:
          $this->filterCarsByBrand($filterArray);
        break;

        case 2:
          $this->filterCarsByModel($filterArray);
        break;

        case 3:
          $this->filterCarsByMilage($filterArray);
        break;

        default:
        // code...
        break;
      }
      return filterCars($req);
    }

    public function filterCarsByBrand($filterArray) {
      $req = $this->db->prepare(
        'SELECT c.CAR_ID, c.CAR_MILAGE, c.CAR_COLOR, c.CAR_PRICE, c.CAR_DESCRIPTION, c.MODEL_ID FROM car c
        INNER JOIN model m ON c.MODEL_ID = m.MODEL_ID
        INNER JOIN brand b ON m.BRAND_ID = b.BRAND_ID
        WHERE b.BRAND_ID = :brandId'
      );
      $req->bindValue(':brandId', $filterArray[0], PDO::PARAM_STR);

      return $req;
    }

    public function filterCarsByModel($filterArray) {
      $req = $this->db->prepare(
        'SELECT c.CAR_ID, c.CAR_MILAGE, c.CAR_COLOR, c.CAR_PRICE, c.CAR_DESCRIPTION, c.MODEL_ID FROM car c
        INNER JOIN model m ON c.MODEL_ID = m.MODEL_ID
        INNER JOIN brand b ON m.BRAND_ID = b.BRAND_ID
        WHERE b.BRAND_ID = :brandId AND m.MODEL_ID = :modelId'
      );
      $req->bindValue(':brandId', $filterArray[0], PDO::PARAM_STR);
      $req->bindValue(':modelId', $filterArray[1], PDO::PARAM_STR);

      return $req;
    }


    public function filterCarsByMilage($filterArray) {
      $req = $this->db->prepare(
          'SELECT c.CAR_ID, c.CAR_MILAGE, c.CAR_COLOR, c.CAR_PRICE, c.CAR_DESCRIPTION, c.MODEL_ID FROM car c
          INNER JOIN model m ON c.MODEL_ID = m.MODEL_ID
          INNER JOIN brand b ON m.BRAND_ID = b.BRAND_ID
          WHERE b.BRAND_ID = :brandId AND m.MODEL_ID = :modelId AND c.CAR_MILAGE <= :milage'
        );
        $req->bindValue(':brandId', $filterArray[0], PDO::PARAM_STR);
        $req->bindValue(':modelId', $filterArray[1], PDO::PARAM_STR);
        $req->bindValue(':milage', $filterArray[2], PDO::PARAM_STR);

        return $req;
    }

    public function filterCars($req) {
      $carList = array();
      $req->execute();
      while ($car = $req->fetch(PDO::FETCH_OBJ)) {
        $carList[] = new Car($car);
      };
      $req->closeCursor();
      return $carList;
    }

    public function deleteCarById($carId) {
      //Delete the car
      $req = $this->db->prepare("DELETE FROM car WHERE CAR_ID = :carId");
      $req->bindValue(':carId', $carId, PDO::PARAM_STR);
      $req->execute();
      $req->closeCursor();
    }

    public function getLastInsertId(){
      return $this->lastInsertId;
    }


  }

  ?>
