<?php
class Picture {
    private $pictureId;
    private $pictureNum;
    private $pictureDescription;
    private $carId;

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
                case 'PICTURE_ID':
                    $this->setPictureId($value);
                    break;
                case 'PICTURE_NUM':
                    $this->setPictureNum($value);
                    break;
                case 'PICTURE_DESCRIPTION':
                    $this->setPictureDescription($value);
                    break;
                case 'CAR_ID':
                    $this->setCarId($value);
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
    public function getPictureId()
    {
        return $this->pictureId;
    }

    /**
     * Retourne l'ID du Sujet attribué à cette instance.
     * @return integer L'ID du Sujet attribué à cette instance.
     */
    public function getPictureNum()
    {
        return $this->pictureNum;
    }

    /**
     * Retourne la date d'attribution du sujet au sujet de cette instance.
     * @return string La date d'attribution du sujet au sujet de cette instance.
     */
    public function getPictureDescription()
    {
        return $this->pictureDescription;
    }

    /**
     * Retourne la date d'attribution du sujet au sujet de cette instance.
     * @return string La date d'attribution du sujet au sujet de cette instance.
     */
    public function getCarId()
    {
        return $this->carId;
    }

    /**
     * Modifie l'ID de l'Utilisateur attribué à cette instance.
     * @param integer $valeur Le nouvel ID de l'Utilisateur attribué à cette instance.
     */
    public function setPictureId($value)
    {
        $this->pictureId = $value;
    }

    /**
     * Modifie l'ID du Sujet attribué à cette instance.
     * @param integer $valeur Le nouvel ID du Sujet attribué à cette instance.
     */
    public function setPictureNum($value)
    {
        $this->pictureNum = $value;
    }

    /**
     * Modifie l'ID du Sujet attribué à cette instance.
     * @param integer $valeur Le nouvel ID du Sujet attribué à cette instance.
     */
    public function setPictureDescription($value)
    {
        $this->pictureDescription = $value;
    }

    /**
     * Modifie la date d'attribution du sujet de cette instance.
     * @param string $valeur La nouvelle date d'attribution du sujet de cette instance.
     */
    public function setCarId($value)
    {
        $this->carId = $value;
    }

}
?>
