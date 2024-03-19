<?php
    require_once(__DIR__ . '/../DAL/addressDAL.php');

    class addressBUS {
        private $addressList = array();

        private static $instance;

        public static function getInstance() {
            if (!isset(self::$instance)) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function __construct() {
            $this->addressList = array_merge($this->addressList, addressDAL::getInstance()->getAllAddress());
        }
        
        public function getAlladdress() {
            return $this->addressList;
        }

        public function refreshData() {
            $this->addressList = array_merge($this->addressList, addressDAL::getInstance()->getAllAddress());
        }

        public function getAddressByID($id) {
            $this->refreshData();
            foreach($this->addressList as $address) {
                if($address['id'] == $id) {
                    return $address;
                }
            }
            return null;
        }
        public function getAddressByUserID($user_id) {
            return addressDAL::getInstance()->getAddressByUserID($user_id);
        }
        
        public function getTotal() {
            $count = 0;
            foreach ($this->addressList as $address) {
                $count++;
            }
        
            return $count;
        }

        public function getMax() {
            $max = 0;
            foreach ($this->addressList as $address) {
                $max++;
            }
        
            return $max + 1;
        }

        public function addAddress(address $address) {
            if(empty($address->getAddress() || $address->getAddress() === null) ||
            empty($address->getNameReceived() || $address->getNameReceived() === null) ||
            empty($address->getPhoneReceived() || $address->getPhoneReceived() === null) 
            ){
                throw new InvalidArgumentException('Invalid information, check your input again!!');          
            }

            $newaddress = addressDAL::getInstance()->addAddress($address);

            if($newaddress) {
                $this->addressList[] = $address;
                return true;
            }
            return false;
        }

        public function updateAddress(address $address) {
            $result = addressDAL::getInstance()->updateAddress($address);
            return $result;
        }

        public function deleteAddress($id) {
            $address = $this->getAddressByID($id);

            $check = addressDAL::getInstance()->deleteaddress($address['id']);

            if($check) {
                $addressId = $address['id'];
                unset($this->addressList[$addressId]);
            }else {
                throw new InvalidArgumentException('Invalid address');
            }
            return $check;
        }


        public function searchAddress($value,$columnName) {
            return addressDAL::getInstance()->searchAddress($value,['user_id','address','name_received','phone_received']);
        }
    }   
?>