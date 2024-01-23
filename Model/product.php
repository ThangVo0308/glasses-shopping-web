<?php
    class product {
        private $id,$name,$category_id,$image,$gender,$price,$description,$status;

        public function __construct($id,$name,$category_id,$image,$gender,$price,$description,$status) {
            $this->id= $id;
            $this->name=$name;
            $this->category_id=$category_id;
            $this->image=$image;
            $this->gender=$gender;
            $this->price=$price;
            $this->description=$description;
            $this->status=$status;
        }

        public function setID($id) {
            $this->id = $id;
          }
          
        public function getID() {
            return $this->id;
        }

        public function setName($name) {
            $this->name = $name;
          }
          
        public function getName() {
            return $this->name;
        }

        public function setCategoryID($category_id) {
            $this->category_id = $category_id;
          }
          
        public function getCaterogyID() {
            return $this->category_id;
        }

        public function setImage($image) {
            $this->image = $image;
        }

        public function getImage() {
            return $this->image;
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

        public function getStatus() {
            return $this->status;
        }

        public function setStatus($status) {
            $this->status = $status;
        }

        public function getGender() {
            return $this->gender;
        }

        public function setGender($status) {
            $this->status = $status;
        }
    }

?>