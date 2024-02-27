<?php
header('Content-Type: application/json');
require_once("../../BE/BUS/userBUS.php");
require_once("../../model/users.php");
require_once("../../enum/UserStatus.php");

// $auth = $_SERVER['REQUEST_METHOD'] === 'POST';

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

    
    $newUser = new users(userBUS::getInstance()->getMax(), $username, $password, $email, $name, $phone, 1, "../../icons/whiteUser.png", 2, $address, UserStatus::ACTIVE);
    $userBus = userBUS::getInstance()->addUser($newUser);
    if ($userBus) {
        $response['check'] = true;
    } else {
        $response['check'] = false;
    }
    echo json_encode(['response' => $response]);
} else {
    echo json_encode(['error' => 'Invalid request method']);
}
