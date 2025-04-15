<?php
require "../includes/product-class.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = new Product();

$target_path = "../Images/";  
$target_path = $target_path.basename( $_FILES['fileToUpload']['name']);   
  
if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_path)) {  
    $user->InsertProduct($_POST['name'], $_POST['prijs'], $target_path);
    header('location:view-product.php');
} else{  
        echo "Sorry, file not uploaded, please try again!";  
    }  
    

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Naam">
        <input type="text" name="prijs" placeholder="Prijs">
        <input type="file" name="fileToUpload"/>  
    <input type="submit" value="Toevoegen product" name="submit"/> 
    </form>
</body>
</html>