<?php
    class Orders {
        private $id, $userId, $orderDate, $totalPrice, $pointsEarned, $pointUsed, $addressId, $status;
        
        public function __construct($id = null, $userId = null, $orderDate = null, $totalPrice = null, $pointsEarned = null, $pointUsed = null, $addressId = null, $status = null) { 
            $this->id = $id; 
            $this->userId = $userId; 
            $this->orderDate = $orderDate; 
            $this->totalPrice = $totalPrice; 
            $this->pointsEarned = $pointsEarned; 
            $this->pointUsed = $pointUsed; 
            $this->addressId = $addressId; 
            $this->status = $status; 
        }
        
        function getId() { 
             return $this->id; 
        } 
    
        function getUserId() { 
             return $this->userId; 
        } 
    
        function getOrderDate() { 
             return $this->orderDate; 
        } 
    
        function getTotalPrice() { 
             return $this->totalPrice; 
        } 
    
        function getPointsEarned() { 
             return $this->pointsEarned; 
        } 
    
        function getPointUsed() { 
             return $this->pointUsed; 
        } 
    
        function getAddressId() { 
             return $this->addressId; 
        } 
    
        function getStatus() { 
             return $this->status; 
        } 
    
        function setId($id) {  
            $this->id = $id; 
        } 
    
        function setUserId($userId) {  
            $this->userId = $userId; 
        } 
    
        function setOrderDate($orderDate) {  
            $this->orderDate = $orderDate; 
        } 
    
        function setTotalPrice($totalPrice) {  
            $this->totalPrice = $totalPrice; 
        } 
    
        function setPointsEarned($pointsEarned) {  
            $this->pointsEarned = $pointsEarned; 
        } 
    
        function setPointUsed($pointUsed) {  
            $this->pointUsed = $pointUsed; 
        } 
    
        function setAddressId($addressId) {  
            $this->addressId = $addressId; 
        } 
    
        function setStatus($status) {  
            $this->status = $status; 
        } 
    }
?>
