<?php
    class imports_item{
        private $id,$import_id,$product_id,$quantity,$price;
        public function __constructor($id,$import_id,$product_id,$quantity,$price) { 
            $this->id = $id; 
            $this->import_id = $import_id; 
            $this->product_id = $product_id; 
            $this->quantity = $quantity; 
            $this->price = $price; 
        }
        function getId() { 
             return $this->id; 
        } 
    
        function getImportid() { 
             return $this->import_id; 
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
    
        function setImportid($importid) {  
            $this->import_id = $importid; 
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