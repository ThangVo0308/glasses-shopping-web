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


    }

?>