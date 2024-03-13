<?php
    class order_items{
        private $id, $order_id, $product_id, $discount_id,$quantity, $price;
        
        public function __construct($id = null, $order_id = null, $product_id = null, $discount_id = null,$quantity = null, $price = null) { 
            $this->id = $id; 
            $this->order_id = $order_id; 
            $this->product_id = $product_id; 
            $this->quantity = $quantity; 
            $this->price = $price; 
            $this->discount_id = $discount_id;
        }
        
        function getId() { 
             return $this->id; 
        } 
    
        function getOrderid() { 
             return $this->order_id; 
        } 
    
        function getProductid() { 
             return $this->product_id; 
        } 
    
        function getQuantity() { 
             return $this->quantity; 
        } 
    
        function getPrice() { 
             return $this->price; 
        } 
    
        function getDiscountId() { 
             return $this->discount_id; 
        } 
    
        function setId($id) {  
            $this->id = $id; 
        } 
    
        function setOrderid($orderid) {  
            $this->order_id = $orderid; 
        } 
    
        function setProductid($productid) {  
            $this->product_id = $productid; 
        } 
    
        function setQuantity($quantity) {  
            $this->quantity = $quantity; 
        } 
    
        function setPrice($price) {  
            $this->price = $price; 
        } 
    
        function setDiscountId($discount_id) {  
            $this->discount_id = $discount_id; 
        } 
    }
?>