<?php
header('Content-Type: application/json');
session_start();

require_once("../../BE/BUS/productBUS.php");
require_once("../../BE/BUS/orderBUS.php");
require_once("../../BE/BUS/orderItemBUS.php");
require_once("../../BE/BUS/pointBUS.php");
require_once("../../model/product.php");
require_once("../../model/orders.php");
require_once("../../model/order_items.php");
require_once("../../model/points.php");
require_once("../../enum/OrderStatus.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = $_POST['data'];

    date_default_timezone_set('Asia/Ho_Chi_Minh');

    $userID =  $_SESSION['currentUser']['id'] ?? null;
    $currentDate = date('Y-m-d H:i:s');
    $allTotal = $data['total'] ?? null;
    $pointEarned = $data['pointEarned'];
    $pointUsed = $data['pointUsed'] ?? 0;
    $address_id = $data['address'] ?? null;

    
    $order_model = new orders(orderBUS::getInstance()->getMax(), $userID, $currentDate, $allTotal, $pointEarned, $pointUsed, $address_id, OrderStatus::PENDING);
    $newOrder = orderBUS::getInstance()->addOrder($order_model);

    $productList = $data['productList'];
    foreach ($productList as $product) {
        // $id = $product->id ?? null;
        // $name = $product->name ?? null;
        // $quantity = $product->quantity ?? null;
        // $price = $product->price ?? null;
        // $totalProduct = $product->totalProduct ?? null;
        $discountID = $product['discount']['id'] ?? null;

        if ($newOrder) {
            $discountPrice = $product['discount'] != null ? intval($product['discount']['discount_percent']) : 0;
            $total = $discountPrice > 0 ? $product['product']['price'] - ($discountPrice/100)*$product['product']['price'] : $product['product']['price']; 

            $orderItem_model = new order_items(orderItemBUS::getInstance()->getMax(), $order_model->getId(),$product['product']['id'] , $discountID , $product['quantity'], $total);
            $newOrderItem = orderItemBUS::getInstance()->addOrderItem($orderItem_model);
                        
            $newQuantity = $product['product']['quantity'] - $product['quantity'];

            if($newQuantity == 0) {
                $updateValueProduct = new product($product['product']['id'], $product['product']['name'], $product['product']['category_id'], $product['product']['image'], $product['product']['gender'], $product['product']['price'], $product['product']['description'], $newQuantity, ProductStatus::SOLDOUT);
                $updateProduct = productBUS::getInstance()->updateProduct($updateValueProduct);
            }

            $updateValueProduct = new product($product['product']['id'], $product['product']['name'], $product['product']['category_id'], $product['product']['image'], $product['product']['gender'], $product['product']['price'], $product['product']['description'], $newQuantity, ProductStatus::ACTIVE);
            $updateProduct = productBUS::getInstance()->updateProduct($updateValueProduct);
        }
    }

    $point = pointBUS::getInstance()->getPointByUserID($_SESSION['currentUser']['id']);
    $newPointUsed = $point['points_used'] + intval($pointUsed);
    $newPointEarned = $pointUsed > 0 ? intval($pointEarned) : intval($point['points_earned'] + $pointEarned) ;
    $updateValuePoint = new points($point['id'], $point['user_id'], $newPointEarned, $newPointUsed);
    $updatePoint = pointBUS::getInstance()->updatePoint($updateValuePoint);


    if ($newOrder) {
        unset($_SESSION['productList']);
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
}
