<?php
class Category
{
    private $id = null;
    private $HP = null;
    private $Manufacturer = null;
    private $MaxSpeed = null;
    private $NumberOfCyl = null;
    
    public function __construct($id , $HP, $Manufacturer, $MaxSpeed,$NumberOfCyl)
    {
        $this->id = $id;
        $this->HP = $HP;
        $this->Manufacturer = $Manufacturer;
        $this->MaxSpeed = $MaxSpeed;
        $this->NumberOfCyl = $NumberOfCyl;
    }
    public function setid($id)
    {
        $this->id = $id;
    }
    public function getid()
    {
        return $this->id;
    }
    public function getHP()
    {
        return $this->HP;
    }
    public function setHP($HP)
    {
        $this->HP = $HP;
    }
    public function getManufacturer()
    {
        return $this->Manufacturer;
    }
    public function setManufacturer($Manufacturer)
    {
        $this->Manufacturer = $Manufacturer;
    }
    public function getMaxSpeed()
    {
        return $this->MaxSpeed;
    }
    public function setMaxSpeed($MaxSpeed)
    {
        $this->MaxSpeed = $MaxSpeed;
    }
    public function getNumberOfCyl()
    {
        return $this->NumberOfCyl;
    }
    public function setNumberOfCyl($NumberOfCyl)
    {
        $this->NumberOfCyl = $NumberOfCyl;
    }
}
?>