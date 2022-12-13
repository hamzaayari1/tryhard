<?php

class CategoryC
{
    public function listCategory() //affichage de Category
    {
        $sql = "SELECT * FROM category";
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
    public function CategoryBySearch($search)
    {
        $sql = "SELECT * FROM category WHERE Manufacturer LIKE '%" . $search . "%'";
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
    public function allCategoryPages($start, $rows, $search)
    {
        $sql =
        "SELECT * FROM category  WHERE Manufacturer LIKE '%" .
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
    function deleteCategory($id)
    {
        $sql = "DELETE FROM category WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function addCategory($Category)
    {
        $sql = "INSERT INTO Category (id, HP, Manufacturer, MaxSpeed, NumberOfCyl) 
        VALUES (:id,:HP,:Manufacturer,:MaxSpeed,:NumberOfCyl)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id' => $Category->getid(),
                'HP' => $Category->getHP(),
                'Manufacturer' => $Category->getManufacturer(), 
                'MaxSpeed' => $Category->getMaxSpeed(),
                'NumberOfCyl' => $Category->getNumberOfCyl(),
                          
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateCategory($Category, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE Category SET    
                  HP = :HP,              
                  Manufacturer = :Manufacturer, 
                  MaxSpeed = :MaxSpeed, 
                  NumberOfCyl=:NumberOfCyl
                WHERE id= :id'
            );
            $query->execute([
                'id' => $id,
                'HP' => $Category->getHP(),
                'Manufacturer' => $Category->getManufacturer(), 
                'MaxSpeed' => $Category->getMaxSpeed(),
                'NumberOfCyl' => $Category->getNumberOfCyl(),
            ]);
        } catch (PDOException $e) {
           echo $e->getMessage();
        }
    }
    function showCategory($id)
    {
        $sql = "SELECT * FROM category where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $Category = $query->fetch();
            return $Category;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function showCategoryDependingOnSpeedLowerThen($speed)
    {
        $sql = "SELECT * FROM category where MaxSpeed < $speed";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $Category = $query->rowcount();
            return $Category;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function showCategoryDependingOnSpeedBiggerThen($speed)
    {
        $sql = "SELECT * FROM category where MaxSpeed > $speed";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $Category = $query->rowcount();
            return $Category;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
?>