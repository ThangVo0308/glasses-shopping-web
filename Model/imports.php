<?php
    class imports{
        private $id,$import_date,$user_id,$price;
        
        public function __constructor($id,$import_date,$user_id,$price) { 
            $this->id = $id; 
            $this->import_date = $import_date; 
            $this->user_id = $user_id; 
            $this->price = $price; 
        }
        function getId() { 
             return $this->id; 
        } 
    
        function getImportdate() { 
             return $this->import_date; 
        } 
    
        function getUserid() { 
             return $this->user_id; 
        } 
    
        function getPrice() { 
             return $this->price; 
        } 
    
        function setId($id) {  
            $this->id = $id; 
        } 
    
        function setImportdate($importdate) {  
            $this->import_date = $importdate; 
        } 
    
        function setUserid($userid) {  
            $this->user_id = $userid; 
        } 
    
        function setPrice($price) {  
            $this->price = $price; 
        } 
    }


?>