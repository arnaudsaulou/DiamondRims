<?php
class Brand {
    private $brandId;
    private $brandName;
    private $brandDescription;

    /**
     * Retourne une nouvelle instance d'Attribue.
     * @param array $valeurs Un tableau associatif contenant les données à associer à cette instance.
     */
    public function __construct($valeurs = array())
    {
        if (!empty($valeurs)) {
            $this->affect($valeurs);
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
                case 'BRAND_ID':
                    $this->setBrandId($value);
                    break;
                case 'BRAND_NAME':
                    $this->setBrandName($value);
                    break;
                case 'BRAND_DESCRIPTION':
                    $this->setBrandDescription($value);
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
    public function getBrandId()
    {
        return $this->brandId;
    }

    /**
     * Retourne l'ID du Sujet attribué à cette instance.
     * @return integer L'ID du Sujet attribué à cette instance.
     */
    public function getBrandName()
    {
        return $this->brandName;
    }

    /**
     * Retourne la date d'attribution du sujet au sujet de cette instance.
     * @return string La date d'attribution du sujet au sujet de cette instance.
     */
    public function getBrandDescription()
    {
        return $this->brandDescription;
    }

    /**
     * Modifie l'ID de l'Utilisateur attribué à cette instance.
     * @param integer $valeur Le nouvel ID de l'Utilisateur attribué à cette instance.
     */
    public function setBrandId($value)
    {
        $this->brandId = $value;
    }

    /**
     * Modifie l'ID du Sujet attribué à cette instance.
     * @param integer $valeur Le nouvel ID du Sujet attribué à cette instance.
     */
    public function setBrandName($value)
    {
        $this->brandName = $value;
    }

    /**
     * Modifie la date d'attribution du sujet de cette instance.
     * @param string $valeur La nouvelle date d'attribution du sujet de cette instance.
     */
    public function setBrandDescription($value)
    {
        $this->brandDescription = $value;
    }

}
?>
