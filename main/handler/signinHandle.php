<?php
session_start();
header('Content-Type: application/json');
require_once("../../BE/BUS/userBUS.php");
require_once("../../model/users.php");
require_once("../../enum/UserStatus.php");

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = isset($_POST['username']) ? $_POST['username'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;

    $users = [];
    $response = [
        'username' => $username,
        'password' => $password,
    ];


    foreach(userBUS::getInstance()->getAlluser() as $user) {
        $jsonUser = json_decode(json_encode($user), true);
        $users[] = $jsonUser;

        if ($username === $jsonUser['username'] && $password === $jsonUser['password']) {
            $response['role_id'] = $jsonUser['role_id'];
            $_SESSION['currentUser'] = $jsonUser;
            $response['check'] = true;
            break; 
        }else {
            $response['check'] = false;
        }
    }
    echo json_encode(['response' => $response]);
}

?>
