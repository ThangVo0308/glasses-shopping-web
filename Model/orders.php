<?php
    class orders{
        private $id,$user_id,$order_date,$total_price,$status;
        
        public function __constructor($id,$user_id,$order_date,$total_price,$status) { 
            $this->id = $id; 
            $this->user_id = $user_id; 
            $this->order_date = $order_date; 
            $this->total_price = $total_price; 
            $this->status = $status; 
        }
        function getId() { 
             return $this->id; 
        } 
    
        function getUserid() { 
             return $this->user_id; 
        } 
    
        function getOrderdate() { 
             return $this->order_date; 
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
    
        function setOrderdate($orderdate) {  
            $this->order_date = $orderdate; 
        } 
    
        function setTotalprice($totalprice) {  
            $this->total_price = $totalprice; 
        } 
    
        function setStatus($status) {  
            $this->status = $status; 
        } 
    }
?>