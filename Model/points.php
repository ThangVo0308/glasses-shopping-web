<?php
    class points{
        private $id, $user_id, $transaction_date, $points_earned, $points_used;
        
       public function __constructor($id,$user_id,$transaction_date,$points_earned,$points_used) { 
            $this->id = $id; 
            $this->user_id = $user_id; 
            $this->transaction_date = $transaction_date; 
            $this->points_earned = $points_earned; 
            $this->points_used = $points_used; 
        }
        function getId() { 
             return $this->id; 
        } 
    
        function getUserid() { 
             return $this->user_id; 
        } 
    
        function getTransactiondate() { 
             return $this->transaction_date; 
        } 
    
        function getPointsearned() { 
             return $this->points_earned; 
        } 
    
        function getPointsused() { 
             return $this->points_used; 
        } 
    
        function setId($id) {  
            $this->id = $id; 
        } 
    
        function setUserid($userid) {  
            $this->user_id = $userid; 
        } 
    
        function setTransactiondate($transactiondate) {  
            $this->transaction_date = $transactiondate; 
        } 
    
        function setPointsearned($pointsearned) {  
            $this->points_earned = $pointsearned; 
        } 
    
        function setPointsused($pointsused) {  
            $this->points_used = $pointsused; 
        } 
    }
?>