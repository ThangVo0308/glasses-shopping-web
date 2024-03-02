<?php
    require_once(__DIR__ . '/../DAL/database.php');
    class DiscountDAL {
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

        public function createDiscountFromRow($row)
    {
        $discount = new discounts();
        $discount->setId($row['id']);
        $discount->setName($row['name']);
        $discount->setDiscountpercent($row['discount_percent']);
        $discount->setStartday($row['start_day']);
        $discount->setEndday($row['end_day']);
    
        return $discount;
    }

        public function getAllDiscount() {
            try {
                $query = "select * from discounts";
                $statement = $this->connection->query($query);
                $statement->execute();
                $listDiscount = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $listDiscount;
            }catch(PDOException $e) {
                echo "Query failed: ".$e->getMessage();
                return false;
            }
        }

        public function addDiscount(discounts $discount) {
            try{
                $query = "insert into discounts (name,discount_percent,start_day,end_day) 
                         values (:name,:discount_percent,:start_day,:end_day)";
                $statement = $this->connection->prepare($query);
                $statement->bindParam(':name',$discount->getName());
                $statement->bindParam(':discount_percent',$discount->getDiscountpercent());
                $statement->bindParam(':start_day',$discount->getStartday());
                $statement->bindParam(':end_day',$discount->getEndday());;
                $statement->execute();
                return true;
            }catch(PDOException $e) {
                echo "Add failed: ".$e->getMessage();
                return false;
            }
        }

        public function updateDiscount(discounts $discount) {
            try {
                $query = "update discounts set name=?, discount_percent = ?, start_day=?, end_day=? where id=?";
                $statement = $this->connection->prepare($query);

                $name = $discount->getName();
                $discount_percent = $discount->getDiscountpercent();
                $start_day = $discount->getStartday();     
                $end_day =$discount->getEndday();
                $id = $discount->getID();

                $statement->bindParam(1,$name);
                $statement->bindParam(2,$discount_percent);
                $statement->bindParam(3,$start_day);
                $statement->bindParam(4,$end_day);
                $statement->bindParam(5,$id);

                $statement->execute();
                return true;
            }catch(PDOException $e) {
                echo "Update failed: ".$e->getMessage();
                return false;
            }
        }

        public function deleteDiscount($id) {
            try {
                $query = "delete from discounts where id = ?";
                $statement = $this->connection->prepare($query);

                $statement->bindValue(1, $id, PDO::PARAM_INT);
                $statement->execute();

                return true;
            }catch(PDOException $e) {
                echo "Delete failed: ".$e->getMessage();
                return false;
            }
        }

        public function searchDiscount($condition,$columnName) {
           try {
            $discountList = array();

            if($condition == null || strlen($columnName) == 0) {
                $query = "select * from discounts where concat(id, name, discount_percent, start_day, end_day) like ?";
            }else if(strlen($columnName) == 1) {
                $column = $columnName[0]; // selected column
                $query = "select * from discounts where ".$column.+" like ?";
            }else {
                $columns = implode(",",$columnName);
                $query = "select id, name, discount_percent, start_day, end_day from discounts where concat(".$columns.") like ?";
            }

            $statement = $this->connection->prepare($query);
            if($condition != null) {
                $searchCondition = "%".$condition."%";
                $statement->bindColumn(1,$searchCondition);
            }

            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $product) {
                $product1 = $this->createDiscountFromRow($product);
                $discountList[] = $product1;
            }
            return $discountList;
           }catch(PDOException $e) {
                echo "Search failed".$e->getMessage();
                return array();
           }
        }

    }    


?>



