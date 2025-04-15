<?php
Class DB {
    public $dbh;
 
    public function __construct($db = "winkel", $user="root", $pwd="", $host="localhost"){
        try{
            $this->dbh = new PDO("mysql:host=$host;dbname=$db", $user,$pwd);
        } catch(PDOException $e){
            echo "Connection Failed: " . $e->getMessage();
        }
    }
 
    public function insertProducten($naam, $prijs){
       $stmt = $this->dbh->prepare("INSERT INTO product (naam, prijs ) VALUES (?,?)");
       $stmt->execute([$naam, $prijs]);

    }
 
    public function userRegister($name, $email, $password){
        $stmt = $this->dbh->prepare("INSERT INTO user (name,email, password) VALUES (?,?,?)");
        $password = password_hash($password, PASSWORD_DEFAULT);
        $stmt->execute([$name,$email, $password]);
    }
    public function Login($email){
        $stmt = $this->dbh->prepare("SELECT *  FROM user WHERE email = ?");
        $stmt->execute([$email]);
        $result = $stmt->fetch();
        return $result;
    }
    public function selectProducts(){
        $stmt = $this->dbh->query("SELECT * FROM product");
        $result = $stmt->fetchAll();
        return $result;
    }
    public function editProduct($naam, $prijs, $productCode){
        $stmt = $this->dbh->prepare("UPDATE product SET naam = ?, prijs = ? WHERE productCode =?");
        $stmt->execute([$naam, $prijs, $productCode]);
    }
    
    public function deleteProduct($productCode) {
        $stmt = $this->dbh->prepare("DELETE FROM product WHERE productCode = ?");
        $stmt->execute([$productCode]);
    }
}
 
 
$myDb = new DB();
?>