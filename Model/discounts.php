<?php
    class discounts {
        private $id,$name,$discount_percent,$start_day,$end_day;
        
            public function __constructor($id = null,$name = null,$discount_percent = null,$start_day = null,$end_day = null) { 
                $this->id = $id; 
                $this->name = $name; 
                $this->discount_percent = $discount_percent; 
                $this->start_day = $start_day; 
                $this->end_day = $end_day; 
            }
            function getId() { 
                 return $this->id; 
            } 
        
            function getName() { 
                 return $this->name; 
            } 
        
            function getDiscountpercent() { 
                 return $this->discount_percent; 
            } 
        
            function getStartday() { 
                 return $this->start_day; 
            } 
        
            function getEndday() { 
                 return $this->end_day; 
            } 
        
            function setId($id) {  
                $this->id = $id; 
            } 
        
            function setName($name) {  
                $this->name = $name; 
            } 
        
            function setDiscountpercent($discountpercent) {  
                $this->discount_percent = $discountpercent; 
            } 
        
            function setStartday($startday) {  
                $this->start_day = $startday; 
            } 
        
            function setEndday($endday) {  
                $this->end_day = $endday; 
            } 
    }




?>