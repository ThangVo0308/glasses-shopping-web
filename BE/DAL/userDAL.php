<?php
    require('./database.php');
    class UserDAL {
        private $connection;

        public function __construct() {
            global $connection;
            $this->connection = $connection;
        }

        public function getAllUser() {
            try {
                $query = "select * from users";
                $statement = $this->connection->query($query);
                $statement->execute();
                $listUser = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $listUser;
            }catch(PDOException $e) {
                echo "Query failed: ".$e->getMessage();
                return false;
            }
        }

        public function addUser(users $user) {
            try{
                $query = "insert into users (username,password,email,name,phone,gender,image,role_id,address,status) 
                         values (:username,:password,:email,:name,:phone,:gender,:image,:role_id,:address,:status)";
                $statement = $this->connection->prepare($query);
                $statement->bindParam(':username',$user->getUsername());
                $statement->bindParam(':password',$user->getPassword());
                $statement->bindParam(':email',$user->getEmail());
                $statement->bindParam(':name',$user->getName());;
                $statement->bindParam(':phone',$user->getPhone());
                $statement->bindParam(':gender',$user->getGender());
                $statement->bindParam(':image',$user->getImage());
                $statement->bindParam(':role_id',$user->getRoleid());
                $statement->bindParam(':address',$user->getAddress());
                $statement->bindParam(':status',$user->getStatus());
                $statement->execute();
                return true;
            }catch(PDOException $e) {
                echo "Add failed: ".$e->getMessage();
                return false;
            }
        }

        public function updateUser(users $user) {
            try {
                $query = "update payments set username=?, password = ?, email=?, name=?, phone=?, gender=?, image=?, role_id=?, address=?, status=? where id=?";
                $statement = $this->connection->prepare($query);

                $username = $user->getUsername();
                $password = $user->getPassword();
                $email = $user->getEmail();     
                $name =$user->getName();
                $phone = $user->getPhone();
                $gender = $user->getGender();
                $image = $user->getImage();     
                $role_id =$user->getRoleid();
                $address = $user->getAddress();     
                $status =$user->getStatus();
                $id = $user->getID();

                $statement->bindParam(1,$username);
                $statement->bindParam(2,$password);
                $statement->bindParam(3,$email);
                $statement->bindParam(4,$name);
                $statement->bindParam(5,$phone);
                $statement->bindParam(6,$gender);
                $statement->bindParam(7,$image);
                $statement->bindParam(8,$role_id);
                $statement->bindParam(9,$address);
                $statement->bindParam(10,$status);
                $statement->bindParam(11,$id);

                $statement->execute();
                return true;
            }catch(PDOException $e) {
                echo "Update failed: ".$e->getMessage();
                return false;
            }
        }

        public function deleteUser($id) {
            try {
                $query = "update users set status = 'banned' where id = ?";
                $statement = $this->connection->prepare($query);

                $statement->bindValue(1, $id, PDO::PARAM_INT);
                $statement->execute();

                return true;
            }catch(PDOException $e) {
                echo "Delete failed: ".$e->getMessage();
                return false;
            }
        }

        public function searchUser($condition,$columnName) {
           try {
            $userList = array();

            if($condition == null || strlen($columnName) == 0) {
                $query = "select * from users where concat(id, username, password, email, name, phone, gender, image, role_id, address, status) like ?";
            }else if(strlen($columnName) == 1) {
                $column = $columnName[0]; // selected column
                $query = "select * from users where ".$column.+" like ?";
            }else {
                $columns = implode(",",$columnName);
                $query = "select id, username, password, email, name, phone, gender, image, role_id, address, status from users where concat(".$columns.") like ?";
            }

            $statement = $this->connection->prepare($query);
            if($condition != null) {
                $searchCondition = "%".$condition."%";
                $statement->bindColumn(1,$searchCondition);
            }

            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $product) {
                $userList[] = $product;
            }
            return $userList;
           }catch(PDOException $e) {
                echo "Search failed".$e->getMessage();
                return array();
           }
        }

    }    


?>



