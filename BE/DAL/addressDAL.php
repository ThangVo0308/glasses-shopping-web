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

        public function getAddressByUserID($id,$user_id) {
            try {
                $query = "select * from address where id = ? and user_id=?";
                $statement = $this->connection->prepare($query);
                $statement->bindParam(1,$id);
                $statement->bindParam(2,$user_id);
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
                $statement->bindParam(':user_ud',$address->getUserId());
                $statement->bindParam(':address_received',$address->getAddress());
                $statement->bindParam(':name_received',$address->getNameReceived());
                $statement->bindParam(':phone_received',$address->getPhoneReceived());

                $statement->execute();
                return true;
            }catch(PDOException $e) {
                echo "Add failed: ".$e->getMessage();
                return false;
            }
        }

        public function updateAddress(address $address) {
            try {
                $query = "update address set address_received=?, name_received=?, phone_received where id=?";
                $statement = $this->connection->prepare($query);

                $address = $address->getAddress();
                $name_received = $address->getNameReceived();
                $phone_received = $address->getPhoneReceived();
                $id = $address->getID();

                $statement->bindParam(1,$address);
                $statement->bindParam(2,$name_received);
                $statement->bindParam(3,$phone_received);
                $statement->bindParam(4,$id);

                $statement->execute();
                return true;
            }catch(PDOException $e) {
                echo "Update failed: ".$e->getMessage();
                return false;
            }
        }

        public function deleteAddress($id,$user_id) {
            try {
                $query = "delete from address where id = ? and user_id = ?";
                $statement = $this->connection->prepare($query);

                $statement->bindValue(1, $id, PDO::PARAM_INT);
                $statement->bindValue(2, $user_id, PDO::PARAM_INT);
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



