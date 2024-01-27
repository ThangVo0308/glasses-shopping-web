<?php
    require_once ('./BE/DAL/discountDAL.php');
    class discountBUS {
        private $discountList = array();
        private $discountDAL;

        public function __construct($discountDAL) {
            $this->discountDAL = new discountDAL();
        }

        public function getAlldiscount() {
            return $this->discountDAL->getAlldiscount();
        }

        public function refreshData() {
            $this->discountList = $this->discountDAL->getAlldiscount();
        }

        public function getdiscountById($id) {
            $this->refreshData();
            foreach($this->discountList as $discount) {
                if($discount->getId() == $id) {
                    return $id;
                }
            }
            return null;
        }

        public function addDiscount(discounts $discount) {
            if(empty($discount->getName() || $discount->getName() == null)
                || $discount->getDiscountpercent() < 0
                || strtotime($discount->getStartday()) <= 0
                || strtotime($discount->getEndday()) <= 0
                || strtotime($discount->getStartday()) < strtotime($discount->getEndday())) 
            {
                throw new InvalidArgumentException('Invalid information, check your input!!');
            }

            $newdiscount = $this->discountDAL->addDiscount($discount);
            if($newdiscount) {
                $this->discountList[] = $discount;
                return true;
            }
            return false;
        }

        public function updateDiscount(discounts $discount) {
            $result = $this->discountDAL->updatediscount($discount);
            if($result) {
                $index = array_search($discount,$this->discountList,true);
                if($index !== false) {
                    $this->discountList[$index] = $discount;
                    return $index;
                }
            }
            return -1;
        }   

        public function deleteDiscount($id) {
            $discount = $this->getdiscountById($id);

            $check = $this->discountDAL->deletediscount($discount['id']);

            if($check) {
                $discountId = $discount['id'];
                unset($this->discountList[$discountId]);
            }else {
                throw new InvalidArgumentException('Invalid discount');
            }
            return $check;
        }

        public function filter(discounts $discount,$value,$columns) {
            foreach($columns as $column) {
                switch(strtolower($column)) {
                    case 'id';
                        if(intval($value) == $discount->getId()) {
                            return true;
                        }
                        break;
                    case 'name':
                        if($value === $discount->getName()) {
                            return true;
                        }
                        break;
                    case 'start_day':
                        if(strtotime($value) === strtotime($discount->getStartday())) {
                            return true;
                        }
                        break;
                    case 'end_day':
                        if(strtotime($value) === strtotime($discount->getEndday())) {
                            return true;
                        }
                        break;
                    default: 
                    if($this->checkAllColumns($discount,$value)) {
                        return true;
                    }
                    break;
                }
            }
            return false;
        }

        public function checkAllColumns(discounts $discount,$value) {
            return (
                $discount->getId() === intval($value) ||
                stripos($discount->getName(),$value) ||
                $discount->getStartday() === strtotime($value) ||
                $discount->getEndday() === strtotime($value)
            );
        }

        public function searchDiscount($value,$column) {
            $result = array();
            $listdiscount = $this->discountDAL->searchdiscount($value,$column);
            foreach($listdiscount as $discount) {
                if($this->filter($discount,$value,$column)) {
                    $result[] = $discount;
                }
            }

            if(count($result) <= 0) {
                throw new InvalidArgumentException('No discount found!!');
            }
            return $result;
        }
    }

?>