<?php
header('Content-Type: application/json');
session_start();
require_once("../../BE/BUS/userBUS.php");
require_once("../../model/users.php");
require_once("../../enum/UserStatus.php");
require_once("../../validation/validate.php");
require_once("../../BE/BUS/addressBUS.php");
require_once("../../model/address.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '';
    $password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';
    $address = isset($_POST['address']) ? htmlspecialchars($_POST['address']) : '';


    $response = [
        'username' => $username,
        'password' => $password,
        'email' => $email,
        'name' => $name,
        'phone' => $phone,
        'address' => $address,
    ];

    $validate = new Validate();

    if(!$validate->isValidPhoneNumber($phone)) {
        echo json_encode(['phoneValidate' => false]);
        return;
    }else if(!$validate->isValidEmail($email)) {
        echo json_encode(['emailValidate' => false]);
        return;
    }

    foreach (userBUS::getInstance()->getAlluser() as $user) {
        if($user['username'] == $username) {
            echo json_encode(['usernameResponse' => false]);
            return;
        }else if($user['email'] == $email) {
            echo json_encode(['emailResponse' => false]);
            return;
        }else if($user['name'] == $name) {
            echo json_encode(['nameResponse' => false]);
            return;
        }else if($user['phone'] == $phone) {
            echo json_encode(['phoneResponse' => false]);
            return;
        }
    }
    
    $newUser = new users(userBUS::getInstance()->getMax(), $username, $password, $email, $name, $phone, null, null, 3, $address, UserStatus::ACTIVE);
    $userBus = userBUS::getInstance()->addUser($newUser);
    $address = new Address(addressBUS::getInstance()->getMax(),$_SESSION['currentUser']['id'],$address,$name,$phone);
    $addressBus = addressBUS::getInstance()->addAddress($address);

    if ($userBus && $addressBus) {
        $response['check'] = true;
    } else {
        $response['check'] = false;
    }
    echo json_encode(['response' => $response]);
} else {
    echo json_encode(['error' => 'Invalid request method']);
}
