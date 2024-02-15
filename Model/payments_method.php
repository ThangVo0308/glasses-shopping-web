<?php

    class payments_method{
        private $id,$method_name;
       public function __constructor($id = null,$method_name = null) { 
            $this->id = $id; 
            $this->method_name = $method_name; 
        }
        function getId() { 
             return $this->id; 
        } 
    
        function getMethodname() { 
             return $this->method_name; 
        } 
    
        function setId($id) {  
            $this->id = $id; 
        } 
    
        function setMethodname($methodname) {  
            $this->method_name = $methodname; 
        } 
    }


?>