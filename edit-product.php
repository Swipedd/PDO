<?php
require 'db.php';
$db = new DB();

session_start();
if ($_SESSION['is_logged_in'] == false) {
    header('Location:login.php');
} 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db->editProduct($_POST['naamProduct'],$_POST['prijsProduct'], $_GET['productCode']);
    if ($db) {
        header('Location:insert-product.php?message=Product gewijzigd');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<div class="d-flex justify-content-between align-items-center">
        <div class="container">
        <h2>Product Editen</h2>
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
