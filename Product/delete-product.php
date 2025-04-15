<?php
require "../includes/product-class.php";
$product = new Product();
    $product->deleteProduct($_GET['productCode']);
    header('location:view-product.php');
?>