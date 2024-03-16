<?php 
    header('Content-Type: application/json');
    require_once("../../BE/BUS/productBUS.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $productList = $_POST['data'] ?? null;
        $item_per_page = 8;
        $currentPage = $_POST['page'] ?? 1;
        $offset = ($currentPage - 1) * $item_per_page;

        $result = array_slice($productList,$offset,$item_per_page);

        echo json_encode(['listProduct' => $result]);
    }
?>
