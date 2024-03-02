<?php
require("..\\enum\\ProductStatus.php");

class Product {
    private $id, $name, $category_id, $image, $gender, $price, $description, $quantity, $status;

    public function __construct($id = null, $name = null, $category_id = null, $image = null, $gender = 1, $price = null, $description = null, $quantity = 0, $status = 'active') {
        $this->id = $id;
        $this->name = $name;
        $this->category_id = $category_id;
        $this->image = $image;
        $this->gender = $gender;
        $this->price = $price;
        $this->description = $description;
        $this->quantity = $quantity;
        $this->status = $status;
    }

    public function getID() {
        return $this->id;
    }

    public function setID($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getCategoryID() {
        return $this->category_id;
    }

    public function setCategoryID($category_id) {
        $this->category_id = $category_id;
    }

    public function getImage() {
        return $this->image;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function getGender() {
        return $this->gender;
    }

    public function setGender($gender) {
        $this->gender = $gender;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function __toString() {
        return "Product ID: {$this->getID()}\n" .
            "Name: {$this->getName()}\n" .
            "Category ID: {$this->getCategoryID()}\n" .
            "Image: {$this->getImage()}\n" .
            "Gender: {$this->getGender()}\n" .
            "Price: {$this->getPrice()}\n" .
            "Description: {$this->getDescription()}\n" .
            "Quantity: {$this->getQuantity()}\n" .
            "Status: {$this->getStatus()}\n";
    }
}
?>
