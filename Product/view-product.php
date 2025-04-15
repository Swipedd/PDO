<?php 
require "../includes/product-class.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Overzicht producten</h2>
    <table class="table table-success table-striped">
        <tr>
            <th>ProductCode</th>
            <th>naam</th>
            <th>prijs</th>
            <th>images</th>
            <th colspan="2">Action</th>
        </tr>
        <?php
         $product = new Product();
         $producten = $product->selectProduct();
         foreach ($producten as $product) {
            echo "<tr>";
            echo "<td>".$product['ProductCode']."</td>";
            echo "<td>".$product['naam']."</td>";
            echo "<td>".$product['prijs']."</td>";
            echo "<td> <img src='".$product['images']."' alt='Product afbeelding' width='200' height='100'></td>";
            echo "<td> <a class='btn btn-primary' href='edit-product.php?productCode=".$product['ProductCode']."&name=".$product['naam']."'>Edit</a></td>";
            echo "<td> <a class='btn btn-danger' href='delete-product.php?productCode=".$product['ProductCode']."'>Delete</a></td>";
            echo "</tr>";
        }
        
          
        ?>
</body>
</html>
