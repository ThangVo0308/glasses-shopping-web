<?php
    class discount_item{
        private $id,$product_id,$discount_id;
        public function __constructor($id = null,$product_id = null,$discount_id = null) { 
            $this->id = $id; 
            $this->product_id = $product_id; 
            $this->discount_id = $discount_id; 
        }
        function getId() { 
             return $this->id; 
        } 
    
        function getProductID() { 
             return $this->product_id; 
        } 
    
        function getDiscountid() { 
             return $this->discount_id; 
        } 
    
        function setId($id) {  
            $this->id = $id; 
        } 
    
        function setProductID($product_id) {  
            $this->product_id = $product_id; 
        } 
    
        function setDiscountid($discountid) {  
            $this->discount_id = $discountid; 
        } 
    }


?>