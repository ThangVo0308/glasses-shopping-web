<?php
    // require("..\BE\DAL\paymentDAL.php");
    require_once ("..\BE\DAL\paymentDAL.php");
    class paymentBUS {
        private $paymentList = array();

        private static $instance;

        public static function getInstance() {
            if (!isset(self::$instance)) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function __construct() {
            $this->paymentList = array_merge($this->paymentList, paymentDAL::getInstance()->getAllPayment());
        }
        
        public function getAllpayment() {
            return $this->paymentList;
        }

        public function refreshData() {
            $this->paymentList = array_merge($this->paymentList, paymentDAL::getInstance()->getAllPayment());
        }

        public function getPaymentById($id) {
            foreach ($this->paymentList as $payment) {
                if ($payment['id'] == $id) {
                    return $payment;
                }
            } 
            return null;
        }
        

        public function getMax() {
            $max = 0;
            foreach ($this->paymentList as $payment) {
                $max++;
            }
        
            return $max + 1;
        }

        public function addPayment(payments $payment) {
            if($payment->getOrderid() <= 0
                || $payment->getMethodid() <= 0
                || $payment->getPaymentdate() <= 0 && strtotime($payment->getPaymentdate()) > time()
                || $payment->getPrice() <= 0
            ){
                throw new InvalidArgumentException('Invalid information, check your input again!!');          
            }

            $newpayment = paymentDAL::getInstance()->addPayment($payment);

            if($newpayment) {
                $this->paymentList[] = $payment;
                return true;
            }
            return false;
        }

        public function updatePayment(payments $payment) {
            $result = paymentDAL::getInstance()->updatePayment($payment);
            if($result) {
                $index = array_search($payment,$this->paymentList,true);
                if($index !== false) {
                    $this->paymentList[$index] = $payment;
                    return $index;
                }
            }
            return -1;
        }

        public function deletePayment($id) {
            $payment = $this->getPaymentById($id);

            $check = paymentDAL::getInstance()->deletePayment($payment['id']);

            if($check) {
                $paymentId = $payment['id'];
                unset($this->paymentList[$paymentId]);
            }else {
                throw new InvalidArgumentException('Invalid payment');
            }
            return $check;
        }

        public function filter(payments $payment,$value,$columns) {
            foreach($columns as $column) {
                switch(strtolower($column)) {
                    case 'id':
                        if(intval($value) === $payment->getID()) {
                            return true;
                        }
                        break;
                    case 'order_id':
                        if (intval($value) === $payment->getOrderid()) {
                            return true;
                        }
                        break;
                    case 'method_id':
                        if(intval($value) === $payment->getMethodid()) {
                            return true;
                        }
                        break;
                    case 'payment_date':
                        if(strtotime($value) === $payment->getPaymentdate()) {
                            return true;
                        }
                        break;
                    case 'total_price':
                        if(doubleval($value) === $payment->getPrice()) {
                            return true;
                        }
                        break;
                    default: 
                    if($this->checkAllColumns($payment,$value)) {
                        return true;
                    }
                    break;
                }
            }
            return false;
        }

        public function checkAllColumns(payments $payment,$value) { 
            return (
                $payment->getId() === intval($value) ||
                $payment->getOrderid() === intval($value) ||
                $payment->getMethodid() === intval($value) ||
                $payment->getPaymentdate() === strtotime($value) ||
                doubleval($payment->getPrice()) === doubleval($value) 
            );
        }

        public function searchPayment($value,$column) {
            $results = array();
            $columnString = implode(",", $column);

            $listpayment = paymentDAL::getInstance()->searchPayment($value,$columnString);
            foreach($listpayment as $payment) {
                if($this->filter($payment,$value,$column)) {
                    $results[] = $payment;
                }
            }
            if(count($results) <= 0) {
                throw new InvalidArgumentException('No payment found!!');
            }
            return $results;
        }

    }
?>
