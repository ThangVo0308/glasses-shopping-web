<?php
    class order_items{
        private $id,$order_id,$product_id,$quantity,$price;
        
        public function __constructor($id,$order_id,$product_id,$quantity,$price) { 
            $this->id = $id; 
            $this->order_id = $order_id; 
            $this->product_id = $product_id; 
            $this->quantity = $quantity; 
            $this->price = $price; 
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
    }


?>