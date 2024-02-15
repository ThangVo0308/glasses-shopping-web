<?php
    class users{
        private $id, $username, $password, $email, $name, $phone, $gender, $image, $role_id, $address, $status;
    
        public function __constructor($id = null,$username = null,$password = null,$email = null,$name = null,$phone = null,$gender = null,$image = null,$role_id = null,$address = null,$status = null) { 
            $this->id = $id; 
            $this->username = $username; 
            $this->password = $password; 
            $this->email = $email; 
            $this->name = $name; 
            $this->phone = $phone; 
            $this->gender = $gender; 
            $this->image = $image; 
            $this->role_id = $role_id; 
            $this->address = $address; 
            $this->status = $status; 
        }
        
        
        function getId() { 
             return $this->id; 
        } 
    
        function getUsername() { 
             return $this->username; 
        } 
    
        function getPassword() { 
             return $this->password; 
        } 
    
        function getEmail() { 
             return $this->email; 
        } 
    
        function getName() { 
             return $this->name; 
        } 
    
        function getPhone() { 
             return $this->phone; 
        } 
    
        function getGender() { 
             return $this->gender; 
        } 
    
        function getImage() { 
             return $this->image; 
        } 
    
        function getRoleid() { 
             return $this->role_id; 
        } 
    
        function getAddress() { 
             return $this->address; 
        } 
    
        function getStatus() { 
             return $this->status; 
        } 
    
        function setId($id) {  
            $this->id = $id; 
        } 
    
        function setUsername($username) {  
            $this->username = $username; 
        } 
    
        function setPassword($password) {  
            $this->password = $password; 
        } 
    
        function setEmail($email) {  
            $this->email = $email; 
        } 
    
        function setName($name) {  
            $this->name = $name; 
        } 
    
        function setPhone($phone) {  
            $this->phone = $phone; 
        } 
    
        function setGender($gender) {  
            $this->gender = $gender; 
        } 
    
        function setImage($image) {  
            $this->image = $image; 
        } 
    
        function setRoleid($roleid) {  
            $this->role_id = $roleid; 
        } 
    
        function setAddress($address) {  
            $this->address = $address; 
        } 
    
        function setStatus($status) {  
            $this->status = $status; 
        } 
    
    }





?>