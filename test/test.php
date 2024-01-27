<?php
require_once("../model/product.php");
require_once("../BE/BUS/productBUS.php");

$productBUS = new productBUS();

$product = new product();
$product->setID(6);

$product1 = new product();
$product1->setID(6);
$product1->setName("Test Product");
$product1->setCategoryID(1);  
$product1->setImage("test_image.jpg");
$product1->setGender(0);  
$product1->setPrice(99.99); 
$product1->setDescription("This is a test producttttttt.");
$product1->setStatus(ProductStatus::ACTIVE);
var_dump($product1);

$productBUS = new productBUS();
try {
    $result = $productBUS->deleteProduct($product->getID());
    if($result) {
        echo "delete successfully: ".$product->getID();
    } else {
        echo "delete failed rồi";
    }
} catch(InvalidArgumentException $e) {
    echo $e->getMessage();
}

?>
