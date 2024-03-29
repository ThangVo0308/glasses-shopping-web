<?php
    require_once(__DIR__ . '/../DAL/database.php');
    class orderDAL {
        private $connection;

        private static $instance;

        public static function getInstance() {
            if (!isset(self::$instance)) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function createOrderFromRow($row)
    {
        $order = new orders();
        $order->setId($row['id']);
        $order->setUserid($row['user_id']);
        $order->setOrderdate($row['order_date']);
        $order->setTotalprice($row['total_price']);
        $order->setTotalprice($row['points_earned']);
        $order->setTotalprice($row['points_used']);
        $order->setTotalprice($row['address_id']);
        $order->setTotalprice($row['status']);

        return $order;
    }

        public function __construct() {
            global $connection;
            $this->connection = $connection;
        }

        public function getAllOrder() {
            try {
                $query = "select * from orders";
                $statement = $this->connection->query($query);
                $statement->execute();
                $listOrder = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $listOrder;
            }catch(PDOException $e) {
                echo "Query failed: ".$e->getMessage();
                return false;
            }
        }

        public function addOrder(orders $order) {
            try {
                $user_id = $order->getUserid();
                $order_date = $order->getOrderdate();
                $total_price = $order->getTotalprice();
                $points_earned = $order->getPointsearned();
                $points_used = $order->getPointused();
                $address_id = $order->getAddressId();
                $status = $order->getStatus();
        
                $query = "INSERT INTO orders (user_id, order_date, total_price, points_earned, points_used, address_id, status) 
                          VALUES (:user_id, :order_date, :total_price, :points_earned, :points_used, :address_id, :status)";
                $statement = $this->connection->prepare($query);
                $statement->bindParam(':user_id', $user_id);
                $statement->bindParam(':order_date', $order_date);
                $statement->bindParam(':total_price', $total_price);
                $statement->bindParam(':points_earned', $points_earned);
                $statement->bindParam(':points_used', $points_used);
                $statement->bindParam(':address_id', $address_id);

                $statement->bindParam(':status', $status);
                $statement->execute();
                return true;
            } catch(PDOException $e) {
                echo "Add failed: ".$e->getMessage();
                return false;
            }
        }
        
        

        public function updateOrder(orders $order) {
            try {
                $query = "update orders set user_id=?, order_date = ?, total_price=?, points_earned = ?,points_used = ?, address_id = ?,status = ? where id=?";
                $statement = $this->connection->prepare($query);

                $user_id = $order->getUserid();
                $order_date = $order->getOrderdate();
                $total_price = $order->getTotalprice();   
                $points_earned = $order->getPointsEarned();     
                $points_used = $order->getPointUsed();   
                $address_id = $order->getAddressId();     
                $status = $order->getStatus();
                $id = $order->getID();

                $statement->bindParam(1,$user_id);
                $statement->bindParam(2,$order_date);
                $statement->bindParam(3,$total_price);
                $statement->bindParam(4,$points_earned);
                $statement->bindParam(5,$points_used);
                $statement->bindParam(6,$address_id);
                $statement->bindParam(7,$status);
                $statement->bindParam(8,$id);

                $statement->execute();
                return true;
            }catch(PDOException $e) {
                echo "Update failed: ".$e->getMessage();
                return false;
            }
        }

        public function deleteOrder($id) {
            try {
                $query = "delete from orders where id = ?";
                $statement = $this->connection->prepare($query);
                $statement->bindValue(1, $id, PDO::PARAM_INT);
                $statement->execute();

                return true;
            }catch(PDOException $e) {
                echo "Delete failed: ".$e->getMessage();
                return false;
            }
        }

        public function searchOrder($condition,$columnName) {
           try {
            $orderList = array();

            if($condition == null || strlen($columnName) == 0) {
                $query = "select * from orders where concat(id, user_id, order_date, total_price,points_earned, points_used, address_id,status) like ?";
            }else if(strlen($columnName) == 1) {
                $column = $columnName[0]; // selected column
                $query = "select * from orders where ".$column.+" like ?";
            }else {
                $columns = implode(",",$columnName);
                $query = "select id, user_id, order_date, total_price, points_earned, points_used, address_id, status from orders where concat(".$columns.") like ?";
            }

            $statement = $this->connection->prepare($query);
            if($condition != null) {
                $searchCondition = "%".$condition."%";
                $statement->bindColumn(1,$searchCondition);
            }

            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $product) {
                $product1 = $this->createOrderFromRow($product);
                $orderList[] = $product1;
            }
            return $orderList;
           }catch(PDOException $e) {
                echo "Search failed".$e->getMessage();
                return array();
           }
        }

    }    


?>