<?php
    header('Content-Type: application/json');
    require_once("../../BE/BUS/addressBUS.php");
    require_once("../../validation/validate.php");
    require_once("../../model/address.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $userID = $_POST['userID'] ?? null;
        $name = $_POST['name'] ?? null;
        $phone = $_POST['phone'] ?? null;
        $address = $_POST['address'] ?? null;

        foreach(addressBUS::getInstance()->getAlladdress() as $curAddress) {
            if($curAddress['phone_received'] == $phone && $curAddress['user_id'] == $userID) {
                echo json_encode(['phoneExisted' => false]);
                return;
            }
        }
        $validate = new Validate();
        if(!$validate->isValidPhoneNumber($phone)) {
            echo json_encode(['phoneValidate' => false]);
            return;
        }

        $addressModel = new Address(addressBUS::getInstance()->getMax(),$userID,$address,$name,$phone);
        $newAddress = addressBUS::getInstance()->addAddress($addressModel);

        if($newAddress == true) {
            echo json_encode(['success' => true]);
        }else {
            echo json_encode(['success' => false]);
        }
    }
