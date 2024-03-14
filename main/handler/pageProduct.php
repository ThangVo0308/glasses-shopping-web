<?php 
    header('Content-Type: application/json');
    require_once("../../BE/BUS/productBUS.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $item_per_page = 8;
        $currentPage = $_POST['page'] ?? 1;
        $offset = ($currentPage - 1) * $item_per_page;
        $listProduct = productBUS::getInstance()->getPage($item_per_page, $offset);

        echo json_encode(['listProduct' => $listProduct]);

    }
?>
