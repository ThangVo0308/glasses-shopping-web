<?php
    require('./database.php');
    class PaymentDAL {
        private $connection;

        public function __construct() {
            global $connection;
            $this->connection = $connection;
        }

        public function getAllPayment() {
            try {
                $query = "select * from payments";
                $statement = $this->connection->query($query);
                $statement->execute();
                $listPayment = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $listPayment;
            }catch(PDOException $e) {
                echo "Query failed: ".$e->getMessage();
                return false;
            }
        }

        public function addPayment(payments $payment) {
            try{
                $query = "insert into payments (order_id,method_id,payment_date,total_price) 
                         values (:order_id,:method_id,:payment_date,:total_price)";
                $statement = $this->connection->prepare($query);
                $statement->bindParam(':order_id',$payment->getOrderid());
                $statement->bindParam(':method_id',$payment->getMethodid());
                $statement->bindParam(':payment_date',$payment->getPaymentdate());
                $statement->bindParam(':total_price',$payment->getPrice());;
                $statement->execute();
                return true;
            }catch(PDOException $e) {
                echo "Add failed: ".$e->getMessage();
                return false;
            }
        }

        public function updatePayment(payments $payment) {
            try {
                $query = "update payments set order_id=?, method_id = ?, payment_date=?, total_price=? where id=?";
                $statement = $this->connection->prepare($query);

                $order_id = $payment->getOrderid();
                $method_id = $payment->getMethodid();
                $payment_date = $payment->getPaymentdate();     
                $total_price =$payment->getPrice();
                $id = $payment->getID();

                $statement->bindParam(1,$order_id);
                $statement->bindParam(2,$method_id);
                $statement->bindParam(3,$payment_date);
                $statement->bindParam(4,$total_price);
                $statement->bindParam(5,$id);

                $statement->execute();
                return true;
            }catch(PDOException $e) {
                echo "Update failed: ".$e->getMessage();
                return false;
            }
        }

        public function deletePayment($id) {
            try {
                $query = "delete from payments where id = ?";
                $statement = $this->connection->prepare($query);
                $statement->bindValue(1, $id, PDO::PARAM_INT);
                $statement->execute();

                return true;
            }catch(PDOException $e) {
                echo "Delete failed: ".$e->getMessage();
                return false;
            }
        }

        public function searchPayment($condition,$columnName) {
           try {
            $paymentList = array();

            if($condition == null || strlen($columnName) == 0) {
                $query = "select * from payments where concat(id, order_id, method_id, payment_date, total_price) like ?";
            }else if(strlen($columnName) == 1) {
                $column = $columnName[0]; // selected column
                $query = "select * from payments where ".$column.+" like ?";
            }else {
                $columns = implode(",",$columnName);
                $query = "select id, order_id, method_id, payment_date, total_price from payments where ".$columns." like ?";
            }

            $statement = $this->connection->prepare($query);
            if($condition != null) {
                $searchCondition = "%".$condition."%";
                $statement->bindColumn(1,$searchCondition);
            }

            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $product) {
                $paymentList[] = $product;
            }
            return $paymentList;
           }catch(PDOException $e) {
                echo "Search failed".$e->getMessage();
                return array();
           }
        }

    }    


?>



