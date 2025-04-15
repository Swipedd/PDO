<?php
require "db.php";

class Product {
    private $pdo;

    public function __construct() {
        $this->pdo = new DB();
    }
   public function InsertProduct($name, $prijs, $images) {
       $this->pdo->run("INSERT INTO producten (naam, prijs, images) VALUES (:naam,  :prijs, :images)", ["naam"=>$name,  "prijs"=>$prijs, "images"=>$images]);
   }

   public function SelectProduct(){
    return $this->pdo->run("SELECT * FROM producten")->fetchAll();
   }

   public function editProduct($name, $prijs, $images, $productCode){
    $this->pdo->run("UPDATE producten SET naam = :naam, prijs = :prijs, images = :images  WHERE productCode = :productCode", ["naam"=>$name,  "prijs"=>$prijs, "images"=>$images, "productCode"=> $productCode ]); 
   }

   public function deleteProduct($productCode){
    $this->pdo->run("DELETE FROM producten WHERE productCode = :productCode", ["productCode"=>$productCode]);
   }
}
