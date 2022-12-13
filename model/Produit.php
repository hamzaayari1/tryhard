<?php
class Produit
{
    private $id = null;
    private $OwnerName = null;
    private $categoryId = null;
    private $Price = null;
    private $new = null;
    private $photo = null;
    
    public function __construct($id , $OwnerName, $categoryId, $Price,$new,$photo)
    {
        $this->id = $id;
        $this->photo = $photo;
        $this->OwnerName = $OwnerName;
        $this->categoryId = $categoryId;
        $this->Price = $Price;
        $this->new = $new;
    }
    public function setphoto($photo)
    {
        $this->photo = $photo;
    }
    public function getphoto()
    {
        return $this->photo;
    }
    public function setid($id)
    {
        $this->id = $id;
    }
    public function getid()
    {
        return $this->id;
    }
    public function getOwnerName()
    {
        return $this->OwnerName;
    }
    public function setOwnerName($OwnerName)
    {
        $this->OwnerName = $OwnerName;
    }
    public function getcategoryId()
    {
        return $this->categoryId;
    }
    public function setcategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    }
    public function getPrice()
    {
        return $this->Price;
    }
    public function setPrice($Price)
    {
        $this->Price = $Price;
    }
    public function getnew()
    {
        return $this->new;
    }
    public function setnew($new)
    {
        $this->new = $new;
    }
}
?>