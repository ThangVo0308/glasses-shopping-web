<?php
    class discount_item{
        private $id,$category_id,$discount_id;
        public function __constructor($id,$category_id,$discount_id) { 
            $this->id = $id; 
            $this->category_id = $category_id; 
            $this->discount_id = $discount_id; 
        }
        function getId() { 
             return $this->id; 
        } 
    
        function getCategoryid() { 
             return $this->category_id; 
        } 
    
        function getDiscountid() { 
             return $this->discount_id; 
        } 
    
        function setId($id) {  
            $this->id = $id; 
        } 
    
        function setCategoryid($categoryid) {  
            $this->category_id = $categoryid; 
        } 
    
        function setDiscountid($discountid) {  
            $this->discount_id = $discountid; 
        } 
    }


?>