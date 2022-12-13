<?php

class produitC
{
    public function listProduit() //affichage de produit
    {
        $sql = "SELECT * FROM produit";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $service = $query->fetch();
            $res = [];
            for ($x = 0; $service; $x++) {
                $res[$x] = $service;
                $service = $query->fetch();
            }
            return $res;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function produitBySearch($search)
    {
        $sql = "SELECT * FROM produit WHERE OwnerName LIKE '%" . $search . "%'";
        $db = config::getConnexion();
        try {
        $query = $db->prepare($sql);
        $query->execute();
        $service = $query->fetch();
        $res = [];
        for ($x = 0; $service; $x++) {
            $res[$x] = $service;
            $service = $query->fetch();
        }
        return $res;
        } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        }
    }
    public function allproduitPages($start, $rows, $search)
    {
        $sql =
        "SELECT * FROM produit  WHERE OwnerName LIKE '%" .
        $search .
        "%' LIMIT $start , $rows";
        $db = config::getConnexion();
        try {
        $query = $db->prepare($sql);
        $query->execute();
        $service = $query->fetch();
        $res = [];
        for ($x = 0; $service; $x++) {
            $res[$x] = $service;
            $service = $query->fetch();
        }
        return $res;
        } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        }
    }
    function deleteProduit($id)
    {
        $sql = "DELETE FROM produit WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function addProduit($produit)
    {
        $sql = "INSERT INTO produit (id, OwnerName, categoryId, Price, new,photo)
        VALUES (:id,:OwnerName,:categoryId,:Price,:new,:photo)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id' => $produit->getid(),
                'photo' => $produit->getphoto(),
                'OwnerName' => $produit->getOwnerName(),
                'categoryId' => $produit->getcategoryId(), 
                'Price' => $produit->getPrice(),
                'new' => $produit->getnew(),
                          
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateProduit($produit, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE produit SET    
                  Price = :Price,              
                  OwnerName = :OwnerName, 
                  categoryId = :categoryId, 
                  photo = :photo, 
                  new=:new
                WHERE id= :id'
            );
            $query->execute([
                'id' => $id,
                'photo' => $produit->getphoto(),
                'OwnerName' => $produit->getOwnerName(),
                'categoryId' => $produit->getcategoryId(), 
                'Price' => $produit->getPrice(),
                'new' => $produit->getnew(),
            ]);
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function showProduit($id)
    {
        $sql = "SELECT * FROM produit where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $produit = $query->fetch();
            return $produit;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function showProduitNew()
    {
        $sql = "SELECT * FROM produit where new = 1";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $produit = $query->rowCount();
            return $produit;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function showProduitOld()
    {
        $sql = "SELECT * FROM produit where new = 0";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $produit = $query->rowCount();
            return $produit;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function showProduitFullInfo()
    {
        $sql = "SELECT * FROM produit where new = 0";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $produit = $query->rowCount();
            return $produit;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
?>