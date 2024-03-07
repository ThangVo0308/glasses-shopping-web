<?php
    require_once(__DIR__ . '/../DAL/database.php');
    class DiscountItemDAL {
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

        public function createDiscountItemFromRow($row)
    {
        $discountItem = new discount_item();
        $discountItem->setId($row['id']);
        $discountItem->setProductID($row['product_id']);
        $discountItem->setDiscountid($row['discount_id']);

        return $discountItem;
    }

        public function getAllDiscountItem() {
            try {
                $query = "select * from discount_items";
                $statement = $this->connection->query($query);
                $statement->execute();
                $listDiscountItem = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $listDiscountItem;
            }catch(PDOException $e) {
                echo "Query failed: ".$e->getMessage();
                return false;
            }
        }

        public function addDiscountItem(discount_item $discountItem) {
            try{
                $query = "insert into discount_items (product_id,discount_id) 
                         values (:category_id,:discount_id)";
                $statement = $this->connection->prepare($query);
                $statement->bindParam(':product_id',$discountItem->getProductID());
                $statement->bindParam(':discount_id',$discountItem->getDiscountid());

                $statement->execute();
                return true;
            }catch(PDOException $e) {
                echo "Add failed: ".$e->getMessage();
                return false;
            }
        }

        public function updateDiscountItem(discount_item $discountItem) {
            try {
                $query = "update discount_items set product_id=?, discount_id = ? where id=?";
                $statement = $this->connection->prepare($query);

                $category_id = $discountItem->getProductID();
                $discount_id = $discountItem->getDiscountid();

                $id = $discountItem->getID();

                $statement->bindParam(1,$category_id);
                $statement->bindParam(2,$discount_id);
                $statement->bindParam(3,$id);

                $statement->execute();
                return true;
            }catch(PDOException $e) {
                echo "Update failed: ".$e->getMessage();
                return false;
            }
        }

        public function deleteDiscountItem($id) {
            try {
                $query = "delete from discount_items where id = ?";
                $statement = $this->connection->prepare($query);

                $statement->bindValue(1, $id, PDO::PARAM_INT);
                $statement->execute();

                return true;
            }catch(PDOException $e) {
                echo "Delete failed: ".$e->getMessage();
                return false;
            }
        }

        public function searchDiscountItem($condition,$columnName) {
           try {
            $discountItemList = array();

            if($condition == null || strlen($columnName) == 0) {
                $query = "select * from discount_items where concat(id, category_id, discount_id) like ?";
            }else if(strlen($columnName) == 1) {
                $column = $columnName[0]; // selected column
                $query = "select * from discount_items where ".$column.+" like ?";
            }else {
                $columns = implode(",",$columnName);
                $query = "select id, category_id, discount_id from discount_items where concat(".$columns.") like ?";
            }

            $statement = $this->connection->prepare($query);
            if($condition != null) {
                $searchCondition = "%".$condition."%";
                $statement->bindColumn(1,$searchCondition);
            }

            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $product) {
                $product1 = $this->createDiscountItemFromRow($product);
                $discountItemList[] = $product1;
            }
            return $discountItemList;
           }catch(PDOException $e) {
                echo "Search failed".$e->getMessage();
                return array();
           }
        }

    }    


?>



