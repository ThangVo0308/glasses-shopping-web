<?php
    require('./database.php');
    class PaymentMethodDAL {
        private $connection;

        public function __construct() {
            global $connection;
            $this->connection = $connection;
        }

        public function getAllPaymentMethod() {
            try {
                $query = "select * from payment_methods";
                $statement = $this->connection->query($query);
                $statement->execute();
                $listPaymentMethod = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $listPaymentMethod;
            }catch(PDOException $e) {
                echo "Query failed: ".$e->getMessage();
                return false;
            }
        }

        public function addPaymentMethod(payments_method $paymentMethod) {
            try{
                $query = "insert into payment_methods (method_name) 
                         values (:method_name)";
                $statement = $this->connection->prepare($query);
                $statement->bindParam(':method_name',$paymentMethod->getMethodname());

                $statement->execute();
                return true;
            }catch(PDOException $e) {
                echo "Add failed: ".$e->getMessage();
                return false;
            }
        }

        public function updatePaymentMethod(payments_method $paymentMethod) {
            try {
                $query = "update orders set method_name=? where id=?";
                $statement = $this->connection->prepare($query);

                $method_name = $paymentMethod->getMethodname();

                $id = $paymentMethod->getID();

                $statement->bindParam(1,$method_name);
                $statement->bindParam(2,$id);

                $statement->execute();
                return true;
            }catch(PDOException $e) {
                echo "Update failed: ".$e->getMessage();
                return false;
            }
        }

        public function deletePaymentMethod($id) {
            try {
                $query = "delete from payment_methods where id = ?";
                $statement = $this->connection->prepare($query);
                $statement->bindValue(1, $id, PDO::PARAM_INT);
                $statement->execute();

                return true;
            }catch(PDOException $e) {
                echo "Delete failed: ".$e->getMessage();
                return false;
            }
        }

        public function searchPaymentMethod($condition,$columnName) {
           try {
            $paymentMethodList = array();

            if($condition == null || strlen($columnName) == 0) {
                $query = "select * from payment_methods where concat(id, method_name) like ?";
            }else if(strlen($columnName) == 1) {
                $column = $columnName[0]; // selected column
                $query = "select * from payment_methods where ".$column.+" like ?";
            }else {
                $columns = implode(",",$columnName);
                $query = "select id, method_name from payment_methods where ".$columns." like ?";
            }

            $statement = $this->connection->prepare($query);
            if($condition != null) {
                $searchCondition = "%".$condition."%";
                $statement->bindColumn(1,$searchCondition);
            }

            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $product) {
                $paymentMethodList[] = $product;
            }
            return $paymentMethodList;
           }catch(PDOException $e) {
                echo "Search failed".$e->getMessage();
                return array();
           }
        }

    }    


?>



