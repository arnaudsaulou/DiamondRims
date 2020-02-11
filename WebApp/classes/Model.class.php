<?php
class Model {
    private $modelId;
    private $modelName;
    private $modelHorsePower;
    private $modelDescription;
    private $brandId;

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
                case 'MODEL_ID':
                    $this->setModelId($value);
                    break;
                case 'MODEL_NAME':
                    $this->setModelName($value);
                    break;
                case 'MODEL_HORSE_POWER':
                    $this->setModelHorsePower($value);
                    break;
                case 'MODEL_DESCRIPTION':
                    $this->setModelDescription($value);
                    break;
                case 'BRAND_ID':
                    $this->setBrandId($value);
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
    public function getModelId()
    {
        return $this->modelId;
    }

    /**
     * Retourne l'ID du Sujet attribué à cette instance.
     * @return integer L'ID du Sujet attribué à cette instance.
     */
    public function getModelName()
    {
        return $this->modelName;
    }

    /**
     * Retourne la date d'attribution du sujet au sujet de cette instance.
     * @return string La date d'attribution du sujet au sujet de cette instance.
     */
    public function getModelHorsePower()
    {
        return $this->modelHorsePower;
    }

    /**
     * Retourne la date d'attribution du sujet au sujet de cette instance.
     * @return string La date d'attribution du sujet au sujet de cette instance.
     */
    public function getModelDescription()
    {
        return $this->modelDescription;
    }

    /**
     * Retourne la date d'attribution du sujet au sujet de cette instance.
     * @return string La date d'attribution du sujet au sujet de cette instance.
     */
    public function getBrandId()
    {
        return $this->brandId;
    }

    /**
     * Modifie l'ID de l'Utilisateur attribué à cette instance.
     * @param integer $valeur Le nouvel ID de l'Utilisateur attribué à cette instance.
     */
    public function setModelId($value)
    {
        $this->modelId = $value;
    }

    /**
     * Modifie l'ID du Sujet attribué à cette instance.
     * @param integer $valeur Le nouvel ID du Sujet attribué à cette instance.
     */
    public function setModelName($value)
    {
        $this->modelName = $value;
    }

    /**
     * Modifie la date d'attribution du sujet de cette instance.
     * @param string $valeur La nouvelle date d'attribution du sujet de cette instance.
     */
    public function setModelHorsePower($value)
    {
        $this->modelHorsePower = $value;
    }

    /**
     * Modifie l'ID du Sujet attribué à cette instance.
     * @param integer $valeur Le nouvel ID du Sujet attribué à cette instance.
     */
    public function setModelDescription($value)
    {
        $this->modelDescription = $value;
    }

    /**
     * Modifie la date d'attribution du sujet de cette instance.
     * @param string $valeur La nouvelle date d'attribution du sujet de cette instance.
     */
    public function setBrandId($value)
    {
        $this->brandId = $value;
    }

}
?>
