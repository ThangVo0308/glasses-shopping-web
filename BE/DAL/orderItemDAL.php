<?php
    require_once(__DIR__ . '/../DAL/database.php');
    class OrderItemDAL {
        private $connection;

        private static $instance;

        public static function getInstance() {
            if (!isset(self::$instance)) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function __construct() {
            global $connection;
            $this->connection = $connection;
        }

        public function createOrderItemFromRow($row)
    {
        $orderItem = new order_items();
        $orderItem->setId($row['id']);
        $orderItem->setOrderid($row['order_id']);
        $orderItem->setProductid($row['product_id']);
        $orderItem->setQuantity($row['quantity']);
        $orderItem->setPrice($row['price']);

        return $orderItem;
    }

        public function getAllOrderItem() {
            try {
                $query = "select * from order_items";
                $statement = $this->connection->query($query);
                $statement->execute();
                $listOrderItem = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $listOrderItem;
            }catch(PDOException $e) {
                echo "Query failed: ".$e->getMessage();
                return false;
            }
        }

        public function addOrderItem(order_items $orderItem) {
            try {
                $query = "INSERT INTO order_items (order_id, product_id, discount_id, quantity, price) 
                          VALUES (:order_id, :product_id, :discount_id, :quantity, :price)";
                $statement = $this->connection->prepare($query);
                $order_id = $orderItem->getOrderid();
                $product_id = $orderItem->getProductid();
                $discount_id = is_numeric($orderItem->getDiscountId()) ? $orderItem->getDiscountId() : null;
                $quantity = $orderItem->getQuantity();
                $price = $orderItem->getPrice();
                $statement->bindParam(':order_id', $order_id);
                $statement->bindParam(':product_id', $product_id);
                $statement->bindParam(':discount_id', $discount_id);
                $statement->bindParam(':quantity', $quantity);
                $statement->bindParam(':price', $price);
                
                $statement->execute();
                return true;
            } catch(PDOException $e) {
                echo "Add failed: ".$e->getMessage();
                return false;
            }
        }
        

        public function updateOrderItem(order_items $orderItems) {
            try {
                $query = "update orderItems set order_id=?, product_id = ?, discount_id = ?, quantity=?, price=? where id=?";
                $statement = $this->connection->prepare($query);

                $order_id = $orderItems->getOrderid();
                $product_id = $orderItems->getProductid();
                $discount_id = $orderItems->getDiscountId();
                $quantity = $orderItems->getQuantity();
                $price = $orderItems->getPrice();
                $id = $orderItems->getId();   
                

                $statement->bindParam(1,$order_id);
                $statement->bindParam(2,$product_id);
                $statement->bindParam(3,$discount_id);
                $statement->bindParam(4,$quantity);
                $statement->bindParam(5,$price);
                $statement->bindParam(6,$id);

                $statement->execute();
                return true;
            }catch(PDOException $e) {
                echo "Update failed: ".$e->getMessage();
                return false;
            }
        }

        public function deleteOrderItem($id) {
            try {
                $query = "delete from order_items where id = ?";
                $statement = $this->connection->prepare($query);

                $statement->bindValue(1, $id, PDO::PARAM_INT);
                $statement->execute();

                return true;
            }catch(PDOException $e) {
                echo "Delete failed: ".$e->getMessage();
                return false;
            }
        }

        public function searchOrderItem($condition,$columnName) {
           try {
            $orderItemList = array();

            if($condition == null || strlen($columnName) == 0) {
                $query = "select * from order_items where concat(id, order_id, product_id, quantity, price) like ?";
            }else if(strlen($columnName) == 1) {
                $column = $columnName[0]; // selected column
                $query = "select * from order_items where ".$column.+" like ?";
            }else {
                $columns = implode(",",$columnName);
                $query = "select id, order_id, product_id, quantity, price from order_items where concat(".$columns.") like ?";
            }

            $statement = $this->connection->prepare($query);
            if($condition != null) {
                $searchCondition = "%".$condition."%";
                $statement->bindColumn(1,$searchCondition);
            }

            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $product) {
                $product1 = $this->createOrderItemFromRow($product);
                $orderItemList[] = $product1;
            }
            return $orderItemList;
           }catch(PDOException $e) {
                echo "Search failed".$e->getMessage();
                return array();
           }
        }

    }    


?>