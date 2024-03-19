<?php
session_start();
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $index = $_POST['index'];
    $status = $_POST['status'];

    if ($status == 'decrease') {
        $_SESSION['productList'][$index]['quantity'] -= 1;
    } else {
        $_SESSION['productList'][$index]['quantity'] += 1;
    }
    $productList = $_SESSION['productList'];

    echo json_encode(['result' => $productList]);
}
