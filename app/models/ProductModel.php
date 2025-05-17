<?php
class ProductModel
{
    private $ID;
    private $NAME;
    private $Description;
    private $Price;

    public function __construct($ID, $NAME, $Description, $Price)
    {
        $this->ID = $ID;
        $this->NAME = $NAME;
        $this->Description = $Description;
        $this->Price = $Price;
    }

    public function getID()
    {
        return $this->ID;
    }
    public function setID($ID)
    {
        $this->ID = $ID;
    }
    public function getNAME()
    {
        return $this->NAME;
    }
    public function setNAME($NAME)
    {
        $this->NAME = $NAME;
    }
    public function getDescription()
    {
        return $this->Description;
    }
    public function setDescription($Description)
    {
        $this->Description = $Description;
    }
    public function getPrice()
    {
        return $this->Price;
    }
    public function setPrice($Price)
    {
        $this->Price = $Price;
    }
}
