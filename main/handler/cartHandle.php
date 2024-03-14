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
    $productList = $_POST['productList'] ?? null;
    $productListArray = array_map('json_decode', $productList);

    $userID = $productListArray[0]->userID ?? null;
    $allTotal = $productListArray[0]->allTotal ?? null;
    $pointEarned = $productListArray[0]->pointEarned ?? null;
    $pointUsed = $productListArray[0]->pointUsed ?? null;
    $address = $productListArray[0]->address ?? null;
    $nameReceived = $productListArray[0]->name_received ?? null;
    $phoneReceived = $productListArray[0]->phone_received ?? null;

    $currentDate = date('Y-m-d H:i:s');

    $order = new orders(orderBUS::getInstance()->getMax(), $userID, $currentDate, $allTotal, $pointEarned, $pointUsed, $address, $nameReceived, $phoneReceived, OrderStatus::PENDING);
    $newOrder = orderBUS::getInstance()->addOrder($order);

    $newPointUsed = 0;
    $newPointEarned = 0;
    $updateProduct = 0;
    $updatePoint = 0;

    foreach ($productListArray as $product) {
        $id = $product->id ?? null;
        $name = $product->name ?? null;
        $quantity = $product->quantity ?? null;
        $price = $product->price ?? null;
        $totalProduct = $product->totalProduct ?? null;
        $discountID = $product->discountID ?? null;


        if ($newOrder) {
            $orderItem = new order_items(orderItemBUS::getInstance()->getMax(), $order->getId(), $id, $discountID, $quantity, $totalProduct);
            $newOrderItem = orderItemBUS::getInstance()->addOrderItem($orderItem);

            $productList = productBUS::getInstance()->getAllProduct();
            foreach ($productList as $product) {
                if ($product['id'] == $id) {
                    $newQuantity = $product['quantity'] - $quantity;
                    $updateValueProduct = new product($product['id'], $product['name'], $product['category_id'], $product['image'], $product['gender'], $product['price'], $product['description'], $newQuantity, ProductStatus::ACTIVE);
                    $updateProduct = productBUS::getInstance()->updateProduct($updateValueProduct);
                    break;
                }
            }
        }
    }

    $pointList = pointBUS::getInstance()->getAllpoint();
    foreach ($pointList as $point) {
        if ($point['user_id'] == $userID) {
            $newPointUsed += intval($pointEarned);
            $newPointEarned = intval($point['points_earned'] - $pointEarned) + (1 / 100) * intval($allTotal);
            $updateValuePoint = new points($point['id'], $point['user_id'], $newPointEarned, $newPointUsed);
            $updatePoint = pointBUS::getInstance()->updatePoint($updateValuePoint);
            break;
        }
    }

    if ($newOrder) {
        unset($_SESSION['productList']);
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
}
