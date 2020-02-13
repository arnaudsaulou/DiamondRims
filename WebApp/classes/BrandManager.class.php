<?php

class BrandManager
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
     * @param Brand $brand L'instance d'Attribue à enregistrer.
     */
    public function addBrand($brand)
    {
        $req = $this->db->prepare(
            'INSERT INTO brand(BRAND_ID,BRAND_NAME,BRAND_DESCRIPTION)
            VALUES (:brandId,:brandName,:brandDescription)');
        $req->bindValue(':brandId', $brand->getBrandId(), PDO::PARAM_STR);
        $req->bindValue(':brandName', $brand->getBrandName(), PDO::PARAM_STR);
        $req->bindValue(':brandDescription', $brand->getBrandDescription(), PDO::PARAM_STR);
        $req->execute();
    }


    public function getAllBrands()
    {
      $brandList = array();
      $req = $this->db->prepare("SELECT BRAND_ID,BRAND_NAME,BRAND_DESCRIPTION FROM brand");
      $req->execute();
      while ($brand = $req->fetch(PDO::FETCH_OBJ)) {
          $brandList[] = new Brand($brand);
      };
      $req->closeCursor();
      return $brandList;
    }


    /**
     * Retourne une instance d'Attribue à partir de son idUtilisateur et son idSujet.
     * @param integer $idUtilisateur L'id de l'Utilisateur de l'Attribue à récupérer.
     * @param integer $idSujet L'id du Sujet de l'Attribue à récupérer.
     * @return Attribue Une instance d'Attribue correspondant aux paramètres spécifiés.
     */
    public function getBrandById($brandId)
    {
        $req = $this->db->prepare(
            'SELECT BRAND_ID,BRAND_NAME,BRAND_DESCRIPTION FROM brand WHERE BRAND_ID= :brandId'
        );
        $req->bindValue(':brandId', $brandId, PDO::PARAM_STR);
        $req->execute();
        $brand = new Brand($req->fetch(PDO::FETCH_OBJ));
        $req->closeCursor();
        return $brand;
    }

    public function deleteBrandById($brandId) {
      $req = $this->db->prepare("DELETE FROM brand WHERE BRAND_ID = :brandId");
      $req->bindValue(':brandId', $brandId, PDO::PARAM_STR);
      $req->execute();
      $req->closeCursor();
    }

}

?>
