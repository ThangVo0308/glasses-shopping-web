<?php
    header('Content-Type: application/json');
    require_once("../../BE/BUS/productBUS.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $productList = $_POST['data'] ?? null;

        $item_per_page = 8;
        $totalProduct = count($productList);
        $totalPage = ceil($totalProduct / $item_per_page);

        echo json_encode(['totalPage' => $totalPage]);
    }
?>

