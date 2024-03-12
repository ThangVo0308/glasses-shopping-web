<?php
header('Content-Type: application/json');
require_once("../../BE/BUS/productBUS.php");
require_once("../../model/product.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $page = $_POST['pageNumber'];
    $productList = $_POST['productList'];

    $firstTenProducts = array_slice($productList, ($page - 1) * 12, 12); 

    echo json_encode(['result' => $firstTenProducts]);
}
?>