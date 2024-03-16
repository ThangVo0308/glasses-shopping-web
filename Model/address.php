<?php
class Address {
    private $id, $user_id, $address, $name_received, $phone_received;

    public function __construct($id = null, $user_id = null, $address = null, $name_received = null, $phone_received = null) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->address = $address;
        $this->name_received = $name_received;
        $this->phone_received = $phone_received;
    }

    public function getId() {
        return $this->id;
    }

    public function getUserId() {
        return $this->user_id;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getNameReceived() {
        return $this->name_received;
    }

    public function getPhoneReceived() {
        return $this->phone_received;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function setNameReceived($name_received) {
        $this->name_received = $name_received;
    }

    public function setPhoneReceived($phone_received) {
        $this->phone_received = $phone_received;
    }

    public function __toString() {
        return "Address ID: {$this->getId()}\n" .
               "User ID: {$this->getUserId()}\n" .
               "Address: {$this->getAddress()}\n" .
               "Name Received: {$this->getNameReceived()}\n" .
               "Phone Received: {$this->getPhoneReceived()}\n";
    }
}
?>
