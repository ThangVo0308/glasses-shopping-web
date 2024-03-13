<?php
    class points{
        private $id, $user_id, $points_earned, $points_used;
        
       public function __construct($id = null,$user_id = null,$points_earned = null,$points_used = null) { 
            $this->id = $id; 
            $this->user_id = $user_id; 

            $this->points_earned = $points_earned; 
            $this->points_used = $points_used; 
        }
        function getId() { 
             return $this->id; 
        } 
    
        function getUserid() { 
             return $this->user_id; 
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
    
    
        function setPointsearned($pointsearned) {  
            $this->points_earned = $pointsearned; 
        } 
    
        function setPointsused($pointsused) {  
            $this->points_used = $pointsused; 
        } 
    }
?>