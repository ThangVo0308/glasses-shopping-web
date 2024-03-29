<?php
    require_once(__DIR__ . '/../DAL/database.php');
    class CategoryDAL {
        private $connection;

        private static $instance;

        
        public function __construct() {
            global $connection;
            $this->connection = $connection;
        }

        public function createCategoryFromRow($row)
        {
            $category = new Categories();
            $category->setId($row['id']);
            $category->setName($row['name']);
    
            return $category;
        }

        public static function getInstance() {
            if (!isset(self::$instance)) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function getAllCategory() {
            try {
                $query = "select * from categories";
                $statement = $this->connection->query($query);
                $statement->execute();
                $listCategory = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $listCategory;
            }catch(PDOException $e) {
                echo "Query failed: ".$e->getMessage();
                return false;
            }
        }

        public function getCategoryByID($id) {
            try {
                $query = "select * from categories where id = ?";
                $statement = $this->connection->prepare($query);
                $statement->bindParam(1,$id);
                $statement->execute();
                $listCategory = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $listCategory;
            }catch(PDOException $e) {
                echo "Query failed: ".$e->getMessage();
                return false;
            }
        }

        public function addCategory(categories $categories) {
            try{
                $query = "insert into categories (name) 
                         values (:name)";
                $statement = $this->connection->prepare($query);
                $statement->bindParam(':name',$categories->getName());
                $statement->execute();
                return true;
            }catch(PDOException $e) {
                echo "Add failed: ".$e->getMessage();
                return false;
            }
        }

        public function updateCategory(categories $categories) {
            try {
                $query = "update categories set name=? where id=?";
                $statement = $this->connection->prepare($query);

                $name = $categories->getName();

                $id = $categories->getID();

                $statement->bindParam(1,$name);
                $statement->bindParam(2,$id);

                $statement->execute();
                return true;
            }catch(PDOException $e) {
                echo "Update failed: ".$e->getMessage();
                return false;
            }
        }

        public function deleteCategory($id) {
            try {
                $query = "delete from categories where id = ?";
                $statement = $this->connection->prepare($query);

                $statement->bindValue(1, $id, PDO::PARAM_INT);
                $statement->execute();

                return true;
            }catch(PDOException $e) {
                echo "Delete failed: ".$e->getMessage();
                return false;
            }
        }

        public function searchCategory($condition,$columnName) {
           try {
            $categoryList = array();

            if($condition == null || strlen($columnName) == 0) {
                $query = "select * from categories where concat(id, name) like ?";
            }else if(strlen($columnName) == 1) {
                $column = $columnName[0]; // selected column
                $query = "select * from categories where ".$column.+" like ?";
            }else {
                $columns = implode(",",$columnName);
                $query = "select id, name from categories where concat(".$columns.") like ?";
            }

            $statement = $this->connection->prepare($query);
            if($condition != null) {
                $searchCondition = "%".$condition."%";
                $statement->bindColumn(1,$searchCondition);
            }

            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $product) {
                $product1 = $this->createCategoryFromRow($product);
                $categoryList[] = $product1;
            }
            return $categoryList;
           }catch(PDOException $e) {
                echo "Search failed".$e->getMessage();
                return array();
           }
        }

    }    


?>



