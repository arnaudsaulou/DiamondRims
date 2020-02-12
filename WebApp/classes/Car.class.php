<?php
class Car {
    private $carId;
    private $carMilage;
    private $carColor;
    private $carPrice;
    private $carDescription;
    private $modelId;

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
                case 'CAR_ID':
                    $this->setCarId($value);
                    break;
                case 'CAR_MILAGE':
                    $this->setCarMilage($value);
                    break;
                case 'CAR_COLOR':
                    $this->setCarColor($value);
                    break;
                case 'CAR_PRICE':
                    $this->setCarPrice($value);
                    break;
                case 'CAR_DESCRIPTION':
                    $this->setCarDescription($value);
                    break;
                case 'MODEL_ID':
                    $this->setModelId($value);
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
    public function getCarId()
    {
        return $this->carId;
    }

    /**
     * Retourne l'ID du Sujet attribué à cette instance.
     * @return integer L'ID du Sujet attribué à cette instance.
     */
    public function getCarMilage()
    {
        return $this->carMilage;
    }

    /**
     * Retourne la date d'attribution du sujet au sujet de cette instance.
     * @return string La date d'attribution du sujet au sujet de cette instance.
     */
    public function getCarColor()
    {
        return $this->carColor;
    }

    /**
     * Retourne l'ID de l'Utilisateur attribué à cette instance.
     * @return integer L'ID de l'Utilisateur attribué à cette instance.
     */
    public function getCarPrice()
    {
        return $this->carPrice;
    }

    /**
     * Retourne l'ID du Sujet attribué à cette instance.
     * @return integer L'ID du Sujet attribué à cette instance.
     */
    public function getCarDescription()
    {
        return $this->carDescription;
    }

    /**
     * Retourne la date d'attribution du sujet au sujet de cette instance.
     * @return string La date d'attribution du sujet au sujet de cette instance.
     */
    public function getModelId()
    {
        return $this->modelId;
    }

    /**
     * Modifie l'ID de l'Utilisateur attribué à cette instance.
     * @param integer $valeur Le nouvel ID de l'Utilisateur attribué à cette instance.
     */
    public function setCarId($value)
    {
        $this->carId = $value;
    }

    /**
     * Modifie l'ID du Sujet attribué à cette instance.
     * @param integer $valeur Le nouvel ID du Sujet attribué à cette instance.
     */
    public function setCarMilage($value)
    {
        $this->carMilage = $value;
    }

    /**
     * Modifie la date d'attribution du sujet de cette instance.
     * @param string $valeur La nouvelle date d'attribution du sujet de cette instance.
     */
    public function setCarColor($value)
    {
        $this->carColor = $value;
    }

    /**
     * Modifie l'ID de l'Utilisateur attribué à cette instance.
     * @param integer $valeur Le nouvel ID de l'Utilisateur attribué à cette instance.
     */
    public function setCarPrice($value)
    {
        $this->carPrice = $value;
    }

    /**
     * Modifie l'ID du Sujet attribué à cette instance.
     * @param integer $valeur Le nouvel ID du Sujet attribué à cette instance.
     */
    public function setCarDescription($value)
    {
        $this->carDescription = $value;
    }

    /**
     * Modifie la date d'attribution du sujet de cette instance.
     * @param string $valeur La nouvelle date d'attribution du sujet de cette instance.
     */
    public function setModelId($value)
    {
        $this->modelId = $value;
    }

}
?>
