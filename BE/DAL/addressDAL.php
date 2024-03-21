<?php
    require_once(__DIR__ . '/../DAL/database.php');

    class addressDAL {
        private $connection;

        private static $instance;

        
        public function __construct() {
            global $connection;
            $this->connection = $connection;
        }

        public function createAddressFromRow($row)
        {
            $address = new address();
            $address->setId($row['id']);
            $address->setAddress($row['address_received']);
            $address->setNameReceived($row['name_received']);
            $address->setPhoneReceived($row['phone_received']);

            return $address;
        }

        public static function getInstance() {
            if (!isset(self::$instance)) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function getAllAddress() {
            try {
                $query = "select * from address";
                $statement = $this->connection->query($query);
                $statement->execute();
                $listAddress = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $listAddress;
            }catch(PDOException $e) {
                echo "Query failed: ".$e->getMessage();
                return false;
            }
        }

        public function getAddressByID($id) {
            try {
                $query = "select * from address where id = ?";
                $statement = $this->connection->prepare($query);
                $statement->bindParam(1,$id);
                $statement->execute();
                $listAddress = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $listAddress;
            }catch(PDOException $e) {
                echo "Query failed: ".$e->getMessage();
                return false;
            }
        }
        public function getAddressByUserID($user_id) {
            try {
                $query = "select * from address where user_id = ?";
                $statement = $this->connection->prepare($query);
                $statement->bindParam(1,$user_id);
                $statement->execute();
                $listAddress = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $listAddress;
            }catch(PDOException $e) {
                echo "Query failed: ".$e->getMessage();
                return false;
            }
        }

        public function addAddress(address $address) {
            try{
                $query = "insert into address (user_id,address_received,name_received,phone_received) 
                         values (:user_id,:address_received,:name_received,:phone_received)";
                $statement = $this->connection->prepare($query);
                
                $userId = $address->getUserId();
                $addressReceived = $address->getAddress();
                $nameReceived = $address->getNameReceived();
                $phoneReceived = $address->getPhoneReceived();
                
                $statement->bindParam(':user_id', $userId);
                $statement->bindParam(':address_received', $addressReceived);
                $statement->bindParam(':name_received', $nameReceived);
                $statement->bindParam(':phone_received', $phoneReceived);
        
                $statement->execute();
                return true;
            } catch(PDOException $e) {
                echo "Add failed: ".$e->getMessage();
                return false;
            }
        }
        

        public function updateAddress(address $address) {
            try {
                $query = "UPDATE address SET address_received=?, name_received=?, phone_received=?, user_id=? WHERE id=?";
                $statement = $this->connection->prepare($query);
        
                $addressReceived = $address->getAddress();
                $nameReceived = $address->getNameReceived();
                $phoneReceived = $address->getPhoneReceived();
                $userId = $address->getUserId();
                $addressId = $address->getId();
        
                $statement->bindParam(1, $addressReceived);
                $statement->bindParam(2, $nameReceived);
                $statement->bindParam(3, $phoneReceived);
                $statement->bindParam(4, $userId);
                $statement->bindParam(5, $addressId);
        
                $statement->execute();
                return true;
            } catch(PDOException $e) {
                echo "Update failed: ".$e->getMessage();
                return false;
            }
        }
        

        public function deleteAddress($id) {
            try {
                $query = "delete from address where id = ?";
                $statement = $this->connection->prepare($query);

                $statement->bindValue(1, $id, PDO::PARAM_INT);
                $statement->execute();

                return true;
            }catch(PDOException $e) {
                echo "Delete failed: ".$e->getMessage();
                return false;
            }
        }

        public function searchAddress($condition,$columnName) {
           try {
            $addressList = array();

            if($condition == null || strlen($columnName) == 0) {
                $query = "select * from address where concat(id, user_id, address_received, name_received, phone_received) like ?";
            }else if(strlen($columnName) == 1) {
                $column = $columnName[0]; // selected column
                $query = "select * from address where ".$column.+" like ?";
            }else {
                $columns = implode(",",$columnName);
                $query = "select id, user_id, address_received, name_received, phone_received from address where concat(".$columns.") like ?";
            }

            $statement = $this->connection->prepare($query);
            if($condition != null) {
                $searchCondition = "%".$condition."%";
                $statement->bindColumn(1,$searchCondition);
            }

            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $product) {
                $product1 = $this->createAddressFromRow($product);
                $addressList[] = $product1;
            }
            return $addressList;
           }catch(PDOException $e) {
                echo "Search failed".$e->getMessage();
                return array();
           }
        }

    }    


?>



