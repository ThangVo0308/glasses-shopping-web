<?php
    require('./database.php');
    class OrderItemDAL {
        private $connection;

        public function __construct() {
            global $connection;
            $this->connection = $connection;
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
            try{
                $query = "insert into order_items (order_id,product_id,quantity,price) 
                         values (:order_id,:product_id,:quantity,:price)";
                $statement = $this->connection->query($query);
                $statement->bindParam(':order_id',$orderItem->getOrderid());
                $statement->bindParam(':product_id',$orderItem->getProductid());
                $statement->bindParam(':quantity',$orderItem->getQuantity());
                $statement->bindParam(':price',$orderItem->getPrice());

                $statement->execute();
                return true;
            }catch(PDOException $e) {
                echo "Add failed: ".$e->getMessage();
                return false;
            }
        }

        public function updateOrderItem(order_items $orderItems) {
            try {
                $query = "update orderItems set order_id=?, product_id = ?, quantity=?, price=? where id=?";
                $statement = $this->connection->prepare($query);

                $order_id = $orderItems->getOrderid();
                $product_id = $orderItems->getProductid();
                $quantity = $orderItems->getQuantity();
                $price = $orderItems->getPrice();
                $id = $orderItems->getId();   
                

                $statement->bindParam(1,$order_id);
                $statement->bindParam(2,$product_id);
                $statement->bindParam(3,$quantity);
                $statement->bindParam(4,$price);
                $statement->bindParam(5,$id);

                $statement->execute();
                return true;
            }catch(PDOException $e) {
                echo "Update failed: ".$e->getMessage();
                return false;
            }
        }

        public function deleteOrderItem(order_items $orderItems) {
            try {
                $query = "delete from order_items where id = ?";
                $statement = $this->connection->prepare($query);

                $id = $orderItems->getID();

                $statement->bindParam(1,$id);
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
                $query = "select id, order_id, product_id, quantity, price from order_items where ".$columns." like ?";
            }

            $statement = $this->connection->prepare($query);
            if($condition != null) {
                $searchCondition = "%".$condition."%";
                $statement->bindColumn(1,$searchCondition);
            }

            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $product) {
                $orderItemList[] = $product;
            }
            return $orderItemList;
           }catch(PDOException $e) {
                echo "Search failed".$e->getMessage();
                return array();
           }
        }

    }    


?>



