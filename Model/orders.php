<?php
    class orders{
        private $id,$user_id,$oder_date,$total_price,$status;
        
        public function __constructor($id,$user_id,$oder_date,$total_price,$status) { 
            $this->id = $id; 
            $this->user_id = $user_id; 
            $this->oder_date = $oder_date; 
            $this->total_price = $total_price; 
            $this->status = $status; 
        }
        function getId() { 
             return $this->id; 
        } 
    
        function getUserid() { 
             return $this->user_id; 
        } 
    
        function getOderdate() { 
             return $this->oder_date; 
        } 
    
        function getTotalprice() { 
             return $this->total_price; 
        } 
    
        function getStatus() { 
             return $this->status; 
        } 
    
        function setId($id) {  
            $this->id = $id; 
        } 
    
        function setUserid($userid) {  
            $this->user_id = $userid; 
        } 
    
        function setOderdate($oderdate) {  
            $this->oder_date = $oderdate; 
        } 
    
        function setTotalprice($totalprice) {  
            $this->total_price = $totalprice; 
        } 
    
        function setStatus($status) {  
            $this->status = $status; 
        } 
    }
?>