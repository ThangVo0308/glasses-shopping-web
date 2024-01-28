<?php
    require('./database.php');
    class orderDAL {
        private $connection;

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
            try{
                $query = "insert into orders (user_id,order_date,total_price) 
                         values (:user_id,:product_id,:quantity,:price)";
                $statement = $this->connection->prepare($query);
                $statement->bindParam(':user_id',$order->getUserid());
                $statement->bindParam(':order_date',$order->getOderdate());
                $statement->bindParam(':total_price',$order->getTotalprice());
                $statement->execute();
                return true;
            }catch(PDOException $e) {
                echo "Add failed: ".$e->getMessage();
                return false;
            }
        }

        public function updateOrder(orders $order) {
            try {
                $query = "update orders set user_id=?, order_date = ?, total_price=? where id=?";
                $statement = $this->connection->prepare($query);

                $user_id = $order->getUserid();
                $order_date = $order->getOderdate();
                $total_price = $order->getTotalprice();     
                $id = $order->getID();

                $statement->bindParam(1,$user_id);
                $statement->bindParam(2,$order_date);
                $statement->bindParam(3,$total_price);
                $statement->bindParam(4,$id);

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
                $query = "select * from orders where concat(id, user_id, order_date, total_price) like ?";
            }else if(strlen($columnName) == 1) {
                $column = $columnName[0]; // selected column
                $query = "select * from orders where ".$column.+" like ?";
            }else {
                $columns = implode(",",$columnName);
                $query = "select id, user_id, order_date, total_price from orders where concat(".$columns.") like ?";
            }

            $statement = $this->connection->prepare($query);
            if($condition != null) {
                $searchCondition = "%".$condition."%";
                $statement->bindColumn(1,$searchCondition);
            }

            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $product) {
                $orderList[] = $product;
            }
            return $orderList;
           }catch(PDOException $e) {
                echo "Search failed".$e->getMessage();
                return array();
           }
        }

    }    


?>



