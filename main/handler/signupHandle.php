<?php
header('Content-Type: application/json');
require_once("../../BE/BUS/userBUS.php");
require_once("../../model/users.php");
require_once("../../enum/UserStatus.php");

$auth = $_SERVER['REQUEST_METHOD'] === 'POST';

if ($auth) {
    $username = isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '';
    $password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';
    $address = isset($_POST['address']) ? htmlspecialchars($_POST['address']) : '';

    
    $response = [
        'auth' => $auth,
        'username' => $username,
        'password' => $password,
        'email' => $email,
        'name' => $name,
        'phone' => $phone,
        'address' => $address,
    ];
    
    echo json_encode(['response' => $response]);
    
    // try {
    //     $newUser = new users(userBUS::getInstance()->getMax(), $username, $password, $email, $name, $phone, 1, "../../icons/whiteUser.png", 2, $address, UserStatus::ACTIVE);
    //     $userBus = userBUS::getInstance();
    //     $userBus->addUser($newUser);
    //     echo json_encode(['response' => $response]);
    //     echo json_encode(['success' => 'User added successfully', 'check' => true]);
    // } catch (InvalidArgumentException $e) {
    //     echo json_encode(['error' => $e->getMessage()]);
    // } catch (Exception $e) {
    //     error_log($e->getMessage());

    //     echo json_encode(['error' => 'An error occurred']);
    // }
} else {
    echo json_encode(['error' => 'Invalid request method']);
}
