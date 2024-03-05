<?php
header('Content-Type: application/json');
require_once("../../BE/BUS/productBUS.php");
require_once("../../model/product.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $searchValue = isset($_POST['searchValue']) ? $_POST['searchValue'] : '';
    $categoryId = $_POST['type'] === 'defaultType' ? null : $_POST['type'];
    $gender = $_POST['gender'] === 'defaultGender' ? null : $_POST['gender'];
    $min_price = $_POST['price'];
    $max_price = $_POST['maxPrice'];

    $result=[];
    $data = [];

    $listProduct = productBUS::getInstance()->searchProduct($searchValue,$gender, $categoryId, $min_price, $max_price);

    foreach ($listProduct as $product) {
        $result['id'] = $product->getID();
        $result['name'] = $product->getName();
        $result['category_id'] = $product->getCategoryID();
        $result['image'] = $product->getImage();
        $result['gender'] = $product->getGender();
        $result['price'] = $product->getPrice();
        $result['description'] = $product->getDescription();
        $result['quantity'] = $product->getQuantity();
        $result['status'] = $product->getStatus();
        if($result['gender'] == 2) {
            $result['logo'] = "cart.gif";
        }else if($result['gender'] == 1) {
            $result['logo'] = 'new.gif';
        }else {
            $result['logo'] = 'star.gif';
        }
        $data[] = $result;
    }
    echo json_encode(['result' => $data]);

}
?>