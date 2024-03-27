<?php
header('Content-Type: application/json');
session_start();
require_once("../../../../BE/BUS/productBUS.php");
require_once("../../../../model/product.php");
require_once("../../../../model/users.php");
require_once("../../../../BE/BUS/orderBUS.php");
require_once("../../../../BE/BUS/userBUS.php");
switch($_SERVER["REQUEST_METHOD"]){
    case 'PUT':
        switch($_GET['action']){
            case 'updateProductInfo':
                if(isset($_GET['id'], $_GET['name'], $_GET['kind'], $_GET['image'], $_GET['price'], $_GET['description'], $_GET['status'], $_GET['quantity'])) {
                    // Lấy các giá trị từ mảng $_GET
                    $id = $_GET['id'];
                    $name = $_GET['name'];
                    $kind = $_GET['kind'];
                    $image = $_GET['image'];
                    $gender=$_GET['gender'];
                    $price = $_GET['price'];
                    $description = $_GET['description'];
                    $quantity=$_GET['quantity'];
                    $status = $_GET['status'];
                    
                    $product = new Product();
                    $product->setID($id);
                    $product->setName($name);
                    $product->setCategoryID($kind);
                    $product->setImage($image);
                    $product->setGender($gender);
                    $product->setDescription($description);
                    $product->setStatus($status);
                    $product->setQuantity($quantity);
                    $product->setPrice($price);
                    $result= productBUS::getInstance()->updateProduct($product);    
                }
                break;
            case 'deleteProduct':
                if(isset($_GET['id'])){
                $id=$_GET['id'];
                $result= productBUS::getInstance()->deleteProduct($id);
                }if($result) {
                    echo json_encode(['success' => true]);
                }else {
                    echo json_encode(['success' => false]);

                }
                break;
            case 'deleteAccount':
                if(isset($_GET['id'])){
                    echo json_encode(['success' => true]);
                    $id=$_GET['id'];
                    $result=userBUS::getInstance()->deleteUser($id);
                    if($result) {
                        echo json_encode(['success' => true]);
                    }else {
                        echo json_encode(['success' => false]);

                    }
                }
                break;
            default:
            echo json_encode(['success' => false]);
                break;
        }
        break;
    case'POST':
        switch($_POST['action']){
            case 'addNewProduct':
                if(isset($_POST['id'], $_POST['name'], $_POST['kind'], $_POST['image'], $_POST['price'], $_POST['description'], $_POST['status'])) {
                    $id = $_POST['id'] ?? null;
                    $name = $_POST['name'];
                    $kind = $_POST['kind'];
                    $image = $_POST['image'];
                    $gender=$_POST['gender'];
                    $price = $_POST['price'];
                    $description = $_POST['description'];
                    $status = $_POST['status'];
                    $product=new Product();
                    $product->setID($id);
                    $product->setName($name);
                    $product->setCategoryID($kind);
                    $product->setImage($image);
                    $product->setGender($gender);
                    $product->setDescription($description);
                    $product->setStatus($status);
                    $product->setQuantity(0);
                    $product->setPrice($price);

                    $result= productBUS::getInstance()->addProduct($product);  
                    
                    if($result) {
                        echo json_encode(['success' => true]);
                    }else {
                        echo json_encode(['success' => false]);

                    }
                    
                    break;
                }
            case 'updateOrder' :
                
                if (isset($_POST['id'],$_POST['status'])){
                    $id = $_POST['id'];
                    $status=$_POST['status'];
                    $result=orderBUS::getInstance()->updateStatus($id,$status);
                }if($result) {
                    echo json_encode(['success' => true]);
                }else {
                    echo json_encode(['success' => false]);

                }
                break;
            case 'updateAccount' :
                if(isset($_POST['id'],$_POST['name'],$_POST['username'],$_POST['password'],$_POST['phone'],$_POST['email'],$_POST['role'],$_POST['status'],$_POST['gender'],$_POST['address'],$_POST['image'])){
                    $id=$_POST['id'];
                    $name = $_POST['name'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $phone = $_POST['phone'];
                    $email = $_POST['email'];
                    $role = $_POST['role'];
                    $status = $_POST['status'];
                    $gender = $_POST['gender'];
                    $address = $_POST['address'];
                    $image=$_POST['image'];
                    $user = new users();
                    $user->setId($id);
                    $user->setName($name);
                    $user->setUsername($username);
                    $user->setPassword($password);
                    $user->setEmail($email);
                    $user->setAddress($address);
                    $user->setGender($gender);
                    $user->setPhone($phone);
                    $user->setImage($image);
                    $user->setRoleid($role);
                    $user->setStatus($status);
                    $result= userBUS::getInstance()->updateUser($user);}
                    if($result) {
                        echo json_encode(['success' => true]);
                    }else {
                        echo json_encode(['success' => false]);
    
                    }
            break;
        default:
        break;
            }
    
}
?>