<?php
    class roles{
        private $id,$name;
        public function __constructor($id,$name) { 
            $this->id = $id; 
            $this->name = $name; 
        }
        
        function getId() { 
             return $this->id; 
        } 
    
        function getName() { 
             return $this->name; 
        } 
    
        function setId($id) {  
            $this->id = $id; 
        } 
    
        function setName($name) {  
            $this->name = $name; 
        } 
    }


?>