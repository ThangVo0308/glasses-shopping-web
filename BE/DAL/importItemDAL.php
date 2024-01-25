<?php
    require('./database.php');
    class ImportItemDAL {
        private $connection;

        public function __construct() {
            global $connection;
            $this->connection = $connection;
        }

        public function getAllImportItem() {
            try {
                $query = "select * from import_items";
                $statement = $this->connection->query($query);
                $statement->execute();
                $listImportItem = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $listImportItem;
            }catch(PDOException $e) {
                echo "Query failed: ".$e->getMessage();
                return false;
            }
        }

        public function addImportItem(imports_item $importItem) {
            try{
                $query = "insert into import_items (import_id,product_id,quantity,price) 
                         values (:import_id,:product_id,:quantity,:price)";
                $statement = $this->connection->query($query);
                $statement->bindParam(':import_id',$importItem->getImportid());
                $statement->bindParam(':product_id',$importItem->getProductid());
                $statement->bindParam(':quantity',$importItem->getQuantity());
                $statement->bindParam(':price',$importItem->getPrice());;
                $statement->execute();
                return true;
            }catch(PDOException $e) {
                echo "Add failed: ".$e->getMessage();
                return false;
            }
        }

        public function updateImportItem(imports_item $importItem) {
            try {
                $query = "update payments set import_id=?, product_id = ?, quantity=?, price=? where id=?";
                $statement = $this->connection->prepare($query);

                $import_id = $importItem->getImportid();
                $product_id = $importItem->getProductid();
                $quantity = $importItem->getQuantity();     
                $price =$importItem->getPrice();
                $id = $importItem->getID();

                $statement->bindParam(1,$import_id);
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

        public function deleteImportItem(imports_item $importItem) {
            try {
                $query = "delete from import_items where id = ?";
                $statement = $this->connection->prepare($query);

                $id = $importItem->getID();

                $statement->bindParam(1,$id);
                $statement->execute();

                return true;
            }catch(PDOException $e) {
                echo "Delete failed: ".$e->getMessage();
                return false;
            }
        }

        public function searchImportItem($condition,$columnName) {
           try {
            $importItemList = array();

            if($condition == null || strlen($columnName) == 0) {
                $query = "select * from import_items where concat(id, import_id, product_id, quantity, price) like ?";
            }else if(strlen($columnName) == 1) {
                $column = $columnName[0]; // selected column
                $query = "select * from import_items where ".$column.+" like ?";
            }else {
                $columns = implode(",",$columnName);
                $query = "select id, import_id, product_id, quantity, price from import_items where ".$columns." like ?";
            }

            $statement = $this->connection->prepare($query);
            if($condition != null) {
                $searchCondition = "%".$condition."%";
                $statement->bindColumn(1,$searchCondition);
            }

            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $product) {
                $importItemList[] = $product;
            }
            return $importItemList;
           }catch(PDOException $e) {
                echo "Search failed".$e->getMessage();
                return array();
           }
        }

    }    


?>



