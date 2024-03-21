<?php
    header('Content-Type: application/json');
    require_once("../../BE/BUS/addressBUS.php");
    require_once("../../model/address.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'] ?? null;

        $deleteAddress = addressBUS::getInstance()->deleteAddress($id);

        if($deleteAddress > 0) {
            echo json_encode(['success' => true]);
        }else {
            echo json_encode(['success' => false]);
        }

    }


?>