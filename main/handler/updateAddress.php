<?php
    header('Content-Type: application/json');
    require_once("../../BE/BUS/addressBUS.php");
    require_once("../../validation/validate.php");
    require_once("../../model/address.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'] ?? null;
        $userID = $_POST['userID'] ?? null;
        $name = $_POST['name'] ?? null;
        $phone = $_POST['phone'] ?? null;
        $address = $_POST['address'] ?? null;

        $validate = new Validate();
        if(!$validate->isValidPhoneNumber($phone)) {
            echo json_encode(['phoneValidate' => false]);
            return;
        }

        $addressModel = new Address($id,$userID,$address,$name,$phone);
        $updateAddress = addressBUS::getInstance()->updateAddress($addressModel);

        if($updateAddress == true) {
            echo json_encode(['success' => true]);
        }else {
            echo json_encode(['success' => false]);
        }
    }
