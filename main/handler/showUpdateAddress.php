<?php
header('Content-Type: application/json');
require_once("../../BE/BUS/addressBUS.php");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'] ?? null;

    $data = [];
    $currentInfo = addressBUS::getInstance()->getAddressByID($id);
    $data['name'] = $currentInfo['name_received'];
    $data['phone'] = $currentInfo['phone_received'];
    $data['address'] = $currentInfo['address_received'];

    echo json_encode(['data' => $data]);
}
