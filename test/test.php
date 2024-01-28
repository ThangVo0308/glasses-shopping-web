<?php
require_once("../model/product.php");
require_once("../BE/BUS/productBUS.php");



// 2
    $productBUS = new productBUS();
    if(isset($_POST['search'])) {
        if(!empty($_POST['test'])) {
            try {
                $listProduct = $productBUS->searchProduct(($_POST['test']),['name']);
                foreach($listProduct as $product) {
                    var_dump($product->__toString());
                    echo "<br><br>";
                }
            }catch(InvalidArgumentException $e) {
                echo $e->getMessage();
            }
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
    <h1>Test search</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>"
    method="post">
        <input type="text" id="test" class="test" name="test" placeholder="Tim kiem....">
        <button id="search" class="search" name="search">Search</button>
    </form>
</body>
</html>