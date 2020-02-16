<?php

class ModelManager
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
     * @param Model $model L'instance d'Attribue à enregistrer.
     */
    public function addModel($model)
    {
        $req = $this->db->prepare(
            'INSERT INTO model(MODEL_ID, MODEL_NAME, MODEL_HORSE_POWER, MODEL_DESCRIPTION, BRAND_ID)
            VALUES (:modelId,:modelName,:modelHorsePower,:modelDescription,:brandId)');
        $req->bindValue(':modelId', $model->getModelId(), PDO::PARAM_STR);
        $req->bindValue(':modelName', $model->getModelName(), PDO::PARAM_STR);
        $req->bindValue(':modelHorsePower', $model->getModelHorsePower(), PDO::PARAM_STR);
        $req->bindValue(':modelDescription', $model->getModelDescription(), PDO::PARAM_STR);
        $req->bindValue(':brandId', $model->getBrandId(), PDO::PARAM_STR);
        $req->execute();
    }


    public function getAllModelsByBrand($brandId)
    {
      $modelList = array();
      $req = $this->db->prepare("SELECT MODEL_ID,MODEL_NAME,MODEL_HORSE_POWER,MODEL_DESCRIPTION,BRAND_ID FROM model WHERE BRAND_ID = :brandId");
      $req->bindValue(':brandId', $brandId, PDO::PARAM_STR);
      $req->execute();
      while ($model = $req->fetch(PDO::FETCH_OBJ)) {
          $modelList[] = new Model($model);
      };
      $req->closeCursor();
      return $modelList;
    }


    /**
     * Retourne une instance d'Attribue à partir de son idUtilisateur et son idSujet.
     * @param integer $idUtilisateur L'id de l'Utilisateur de l'Attribue à récupérer.
     * @param integer $idSujet L'id du Sujet de l'Attribue à récupérer.
     * @return Attribue Une instance d'Attribue correspondant aux paramètres spécifiés.
     */
    public function getModelById($modelId)
    {
        $req = $this->db->prepare(
            'SELECT MODEL_ID,MODEL_NAME,MODEL_HORSE_POWER,MODEL_DESCRIPTION,BRAND_ID FROM model WHERE MODEL_ID = :modelId'
        );
        $req->bindValue(':modelId', $modelId, PDO::PARAM_STR);
        $req->execute();
        $model = new Model($req->fetch(PDO::FETCH_OBJ));
        $req->closeCursor();
        return $model;
    }


    public function updateModelById($updatedModel) {
      $req = $this->db->prepare(
        "UPDATE model SET
        MODEL_NAME=:modelName,
        MODEL_HORSE_POWER=:modelHorsePower,
        MODEL_DESCRIPTION=:modelDescription
        WHERE MODEL_ID=:modelId");
      $req->bindValue(':modelName', $updatedModel->getModelName(), PDO::PARAM_STR);
      $req->bindValue(':modelHorsePower', $updatedModel->getModelHorsePower(), PDO::PARAM_STR);
      $req->bindValue(':modelDescription', $updatedModel->getModelDescription(), PDO::PARAM_STR);
      $req->bindValue(':modelId', $updatedModel->getModelId(), PDO::PARAM_STR);
      $req->execute();
      $req->closeCursor();
    }

    public function deleteModelById($modelId) {
      $req = $this->db->prepare("DELETE FROM model WHERE MODEL_ID = :modelId");
      $req->bindValue(':modelId', $modelId, PDO::PARAM_STR);
      $req->execute();
      $req->closeCursor();
    }

}

?>
