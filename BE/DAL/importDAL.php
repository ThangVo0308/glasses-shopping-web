<?php
    require('./database.php');
    class ImImport {
        private $connection;

        public function __construct() {
            global $connection;
            $this->connection = $connection;
        }

        public function getAllImport() {
            try {
                $query = "select * from imports";
                $statement = $this->connection->query($query);
                $statement->execute();
                $listImport = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $listImport;
            }catch(PDOException $e) {
                echo "Query failed: ".$e->getMessage();
                return false;
            }
        }

        public function addImport(imports $import) {
            try{
                $query = "insert into imports (user_id,import_date,total_price) 
                         values (:user_id,:import_date,:total_price)";
                $statement = $this->connection->prepare($query);
                $statement->bindParam(':user_id',$import->getUserID());
                $statement->bindParam(':import_date',$import->getImportdate());
                $statement->bindParam(':total_price',$import->getPrice());

                $statement->execute();
                return true;
            }catch(PDOException $e) {
                echo "Add failed: ".$e->getMessage();
                return false;
            }
        }

        public function updateImport(imports $import) {
            try {
                $query = "update imports set user_id=?, import_date = ?, total_price=? where id=?";
                $statement = $this->connection->prepare($query);

                $user_id = $import->getUserid();
                $import_date = $import->getImportdate();
                $total_price = $import->getPrice();  
                $id = $import->getId();   
                

                $statement->bindParam(1,$user_id);
                $statement->bindParam(2,$import_date);
                $statement->bindParam(3,$total_price);
                $statement->bindParam(4,$id);

                $statement->execute();
                return true;
            }catch(PDOException $e) {
                echo "Update failed: ".$e->getMessage();
                return false;
            }
        }

        public function deleteImport($id) {
            try {
                $query = "delete from imports where id = ?";
                $statement = $this->connection->prepare($query);

                $statement->bindValue(1, $id, PDO::PARAM_INT);
                
                $statement->execute();

                return true;
            }catch(PDOException $e) {
                echo "Delete failed: ".$e->getMessage();
                return false;
            }
        }

        public function searchImport($condition,$columnName) {
           try {
            $importList = array();

            if($condition == null || strlen($columnName) == 0) {
                $query = "select * from imports where concat(id, user_id, import_date, total_price) like ?";
            }else if(strlen($columnName) == 1) {
                $column = $columnName[0]; // selected column
                $query = "select * from imports where ".$column.+" like ?";
            }else {
                $columns = implode(",",$columnName);
                $query = "select id, user_id, import_date, total_price from imports where concat(".$columns.") like ?";
            }

            $statement = $this->connection->prepare($query);
            if($condition != null) {
                $searchCondition = "%".$condition."%";
                $statement->bindColumn(1,$searchCondition);
            }

            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $product) {
                $importList[] = $product;
            }
            return $importList;
           }catch(PDOException $e) {
                echo "Search failed".$e->getMessage();
                return array();
           }
        }

    }    


?>



