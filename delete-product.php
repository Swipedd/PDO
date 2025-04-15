<?php
session_start();
if (isset($_SESSION['is_logged_in']) && $_SESSION['role'] == 'admin' || !isset($_GET['productCode'])) {
    header('Location:insert-product.php');
    exit; // Add exit to prevent further execution
}

try {
    require "db.php";
    $db = new DB();
    $productCode = $_GET['productCode']; 
    $db->deleteProduct($productCode); 
    echo "Product deleted successfully. You will be redirected to the homepage in 5 seconds.";
    header("refresh:5; url=insert-product.php");
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
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
<div class="d-flex justify-content-between align-items-center">
        <div class="container">
        <h2>Product Deleten</h2>
        <form method="POST" class="w-50">
            <div class="form-group">
                <input type="text" value="<?php echo $_GET['name'] ?>" name="naamProduct" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Naam">
            </div>
            <br>
            <div class="form-group">
                <input type="number" name="prijsProduct" step="0.10" class="form-control" name="prijsProduct" placeholder="Prijs">
            </div>
            <input type="submit" class="btn btn-primary">
        </form>
        </div>

        <div class="uitloggen">
                <a class="btn btn-danger" href="uitloggen.php">Uitloggen</a>
        </div>
    </div>

</body>
</html>