<?php
    session_start();
    header('Content-Type: application/json');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $_POST['id'] ?? null;

        $newProductList = [];
        foreach($_SESSION['productList'] as $index => $product) {
            if($product['product']['id'] == $id) {
                unset($_SESSION['productList'][$index]);
            }
        }

        $_SESSION['productList'] = array_values($_SESSION['productList']);

        foreach($_SESSION['productList'] as $product) {
            $newProductList[] = $product;
        }
        echo json_encode(['result' => $newProductList]);
    }

?>