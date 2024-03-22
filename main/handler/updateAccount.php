<?php
header('Content-Type: application/json');
require_once("../../BE/BUS/userBUS.php");
require_once("../../validation/validate.php");
require_once("../../enum/UserStatus.php");
require_once("../../model/users.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'] ?? null;
    $email = $_POST['email'] ?? null;
    $name = $_POST['name'] ?? null;
    $phone = $_POST['phone'] ?? null;
    $gender = $_POST['gender'] ?? null;
    $address = $_POST['address'] ?? null;
    $image = $_POST['image'] ?? null;

    $validate = new Validate();
    if(!$validate->isValidPhoneNumber($phone)) {
        echo json_encode(['phoneValidate' => false]);
        return;
    }else if(!$validate->isValidEmail($email)) {
        echo json_encode(['emailValidate' => false]);
        return;
    }

    foreach (userBUS::getInstance()->getAlluser() as $user) {
        if ($user['email'] == $email && $id != $user['id']) {
            echo json_encode(['emailResponse' => false]);
            return;
        } else if ($user['name'] == $name && $id != $user['id']) {
            echo json_encode(['nameResponse' => false]);
            return;
        } else if ($user['phone'] == $phone && $id != $user['id']) {
            echo json_encode(['phoneResponse' => false]);
            return;
        }
    }

    $user = new users($id, userBUS::getInstance()->getUserById($id)['username'], userBUS::getInstance()->getUserById($id)['password'], $email, $name, $phone, $gender, $image, userBUS::getInstance()->getUserById($id)['role_id'], $address, UserStatus::ACTIVE);
    
    $updateUser = userBUS::getInstance()->updateUser($user);
    if($updateUser) {
        echo json_encode(['success' => true]);
    }else {
        echo json_encode(['success' => false]);
    }

}
