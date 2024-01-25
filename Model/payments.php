<?php
    class payments{
        private $id,$order_id,$method_id,$payment_date,$price;
        public function __constructor($id,$orderid,$methodid,$paymentdate,$price) { 
            $this->id = $id; 
            $this->order_id = $orderid; 
            $this->method_id = $methodid; 
            $this->payment_date = $paymentdate; 
            $this->price = $price; 
        }
        function getId() { 
             return $this->id; 
        } 
    
        function getOrderid() { 
             return $this->order_id; 
        } 
    
        function getMethodid() { 
             return $this->method_id; 
        } 
    
        function getPaymentdate() { 
             return $this->payment_date; 
        } 
    
        function getPrice() { 
             return $this->price; 
        } 
    
        function setId($id) {  
            $this->id = $id; 
        } 
    
        function setOrderid($orderid) {  
            $this->order_id = $orderid; 
        } 
    
        function setMethodid($methodid) {  
            $this->method_id = $methodid; 
        } 
    
        function setPaymentdate($paymentdate) {  
            $this->payment_date = $paymentdate; 
        } 
    
        function setPrice($price) {  
            $this->price = $price; 
        } 
    }


?>