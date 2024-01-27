<?php
    require('./database.php');
    class RoleDAL {
        private $connection;

        public function __construct() {
            global $connection;
            $this->connection = $connection;
        }

        public function getAllRole() {
            try {
                $query = "select * from roles";
                $statement = $this->connection->query($query);
                $statement->execute();
                $listRoles = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $listRoles;
            }catch(PDOException $e) {
                echo "Query failed: ".$e->getMessage();
                return false;
            }
        }

        public function addRole(roles $role) {
            try{
                $query = "insert into roles (name) 
                         values (:name)";
                $statement = $this->connection->prepare($query);
                $statement->bindParam(':name',$role->getName());

                $statement->execute();
                return true;
            }catch(PDOException $e) {
                echo "Add failed: ".$e->getMessage();
                return false;
            }
        }

        public function updateRole(roles $role) {
            try {
                $query = "update roles set name=? where id=?";
                $statement = $this->connection->prepare($query);

                $name = $role->getName();
                $id = $role->getID();

                $statement->bindParam(1,$name);
                $statement->bindParam(2,$id);

                $statement->execute();
                return true;
            }catch(PDOException $e) {
                echo "Update failed: ".$e->getMessage();
                return false;
            }
        }

        public function deleteRole($id) {
            try {
                $query = "delete from roles where id = ?";
                $statement = $this->connection->prepare($query);

                $statement->bindValue(1, $id, PDO::PARAM_INT);
                $statement->execute();

                return true;
            }catch(PDOException $e) {
                echo "Delete failed: ".$e->getMessage();
                return false;
            }
        }

        public function searchRole($condition,$columnName) {
           try {
            $roleList = array();

            if($condition == null || strlen($columnName) == 0) {
                $query = "select * from roles where concat(id, name) like ?";
            }else if(strlen($columnName) == 1) {
                $column = $columnName[0]; // selected column
                $query = "select * from roles where ".$column.+" like ?";
            }else {
                $columns = implode(",",$columnName);
                $query = "select id, name from roles where ".$columns." like ?";
            }

            $statement = $this->connection->prepare($query);
            if($condition != null) {
                $searchCondition = "%".$condition."%";
                $statement->bindColumn(1,$searchCondition);
            }

            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $product) {
                $roleList[] = $product;
            }
            return $roleList;
           }catch(PDOException $e) {
                echo "Search failed".$e->getMessage();
                return array();
           }
        }

    }    


?>



