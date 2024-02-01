<?php
    // require("..\BE\DAL\paymentMethodDAL.php");
    require_once ("..\BE\DAL\paymentMethodDAL.php");
    class paymentMethodBUS {
        private $paymentMethodList = array();
        private $paymentMethodDAL;

        public function __construct() {
            $this->paymentMethodDAL = new paymentMethodDAL();
            $this->paymentMethodList = array_merge($this->paymentMethodList, $this->paymentMethodDAL->getAllPaymentMethod());
        }
        
        public function getAllpaymentMethod() {
            return $this->paymentMethodList;
        }

        public function refreshData() {
            $this->paymentMethodDAL = new paymentMethodDAL();
            $this->paymentMethodList = array_merge($this->paymentMethodList, $this->paymentMethodDAL->getAllPaymentMethod());
        }

        public function getPaymentMethodById($id) {
            foreach ($this->paymentMethodList as $paymentMethod) {
                if ($paymentMethod['id'] == $id) {
                    return $paymentMethod;
                }
            } 
            return null;
        }
        

        public function getMax() {
            $max = 0;
            foreach ($this->paymentMethodList as $paymentMethod) {
                $max++;
            }
        
            return $max + 1;
        }

        public function addPaymentMethod(payments_method $paymentMethod) {
            if(empty($paymentMethod->getMethodname()) || $paymentMethod->getMethodname() == null
            ){
                throw new InvalidArgumentException('Invalid information, check your input again!!');          
            }

            $newpaymentMethod = $this->paymentMethodDAL->addPaymentMethod($paymentMethod);

            if($newpaymentMethod) {
                $this->paymentMethodList[] = $paymentMethod;
                return true;
            }
            return false;
        }

        public function updatePaymentMethod(payments_method $paymentMethod) {
            $result = $this->paymentMethodDAL->updatePaymentMethod($paymentMethod);
            if($result) {
                $index = array_search($paymentMethod,$this->paymentMethodList,true);
                if($index !== false) {
                    $this->paymentMethodList[$index] = $paymentMethod;
                    return $index;
                }
            }
            return -1;
        }

        public function deletePaymentMethod($id) {
            $paymentMethod = $this->getPaymentMethodById($id);

            $check = $this->paymentMethodDAL->deletePaymentMethod($paymentMethod['id']);

            if($check) {
                $paymentMethodId = $paymentMethod['id'];
                unset($this->paymentMethodList[$paymentMethodId]);
            }else {
                throw new InvalidArgumentException('Invalid paymentMethod');
            }
            return $check;
        }

        public function filter(payments_method $paymentMethod,$value,$columns) {
            foreach($columns as $column) {
                switch(strtolower($column)) {
                    case 'id':
                        if(intval($value) === $paymentMethod->getID()) {
                            return true;
                        }
                        break;
                    case 'method_name':
                        if (stripos($paymentMethod->getMethodname(), $value) !== false) {
                            return true;
                        }
                    default: 
                    if($this->checkAllColumns($paymentMethod,$value)) {
                        return true;
                    }
                    break;
                }
            }
            return false;
        }

        public function checkAllColumns(payments_method $paymentMethod,$value) {
            return (
                $paymentMethod->getId() === intval($value) ||
                stripos($paymentMethod->getMethodname(), $value) !== false // $ strtolower($paymentMethod->getname)
            );
        }

        public function searchPaymentMethod($value,$column) {
            $results = array();
            $columnString = implode(",", $column);

            $listpaymentMethod = $this->paymentMethodDAL->searchPaymentMethod($value,$columnString);
            foreach($listpaymentMethod as $paymentMethod) {
                if($this->filter($paymentMethod,$value,$column)) {
                    $results[] = $paymentMethod;
                }
            }
            if(count($results) <= 0) {
                throw new InvalidArgumentException('No paymentMethod found!!');
            }
            return $results;
        }

    }
?>
