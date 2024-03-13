<?php
    class orders{
        private $id,$user_id,$order_date,$total_price,$points_earned,$point_used,$address,$name_received,$phone_received,$status;
        public function __construct($id = null, $userid = null, $orderdate = null, $totalprice = null, $pointsearned = null, $pointused = null, $address = null, $namereceived = null, $phonereceived = null, $status = null) { 
            $this->id = $id; 
            $this->user_id = $userid; 
            $this->order_date = $orderdate; 
            $this->total_price = $totalprice; 
            $this->points_earned = $pointsearned; 
            $this->point_used = $pointused; 
            $this->address = $address; 
            $this->name_received = $namereceived; 
            $this->phone_received = $phonereceived; 
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
    
        function getPointsearned() { 
             return $this->points_earned; 
        } 
    
        function getPointused() { 
             return $this->point_used; 
        } 
    
        function getAddress() { 
             return $this->address; 
        } 
    
        function getNamereceived() { 
             return $this->name_received; 
        } 
    
        function getPhonereceived() { 
             return $this->phone_received; 
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
    
        function setPointsearned($pointsearned) {  
            $this->points_earned = $pointsearned; 
        } 
    
        function setPointused($pointused) {  
            $this->point_used = $pointused; 
        } 
    
        function setAddress($address) {  
            $this->address = $address; 
        } 
    
        function setNamereceived($namereceived) {  
            $this->name_received = $namereceived; 
        } 
    
        function setPhonereceived($phonereceived) {  
            $this->phone_received = $phonereceived; 
        } 
    
        function setStatus($status) {  
            $this->status = $status; 
        } 
    }

?>