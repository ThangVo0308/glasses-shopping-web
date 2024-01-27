<?php
    require_once ('./BE/DAL/discountItemDAL.php');
    class discountItemItemBUS {
        private $discountItemList = array();
        private $discountItemDAL;

        public function __construct($discountItemDAL) {
            $this->discountItemDAL = new discountItemDAL();
        }

        public function getAlldiscountItem() {
            return $this->discountItemDAL->getAlldiscountItem();
        }

        public function refreshData() {
            $this->discountItemList = $this->discountItemDAL->getAlldiscountItem();
        }

        public function getdiscountItemById($id) {
            $this->refreshData();
            foreach($this->discountItemList as $discountItem) {
                if($discountItem->getId() == $id) {
                    return $id;
                }
            }
            return null;
        }

        public function adddiscountItem(discount_item $discountItem) {
            if($discountItem->getCategoryid() <= 0 ||
                $discountItem->getDiscountid() <= 0
            )
            {
                throw new InvalidArgumentException('Invalid information, check your input!!');
            }

            $newdiscountItem = $this->discountItemDAL->adddiscountItem($discountItem);
            if($newdiscountItem) {
                $this->discountItemList[] = $discountItem;
                return true;
            }
            return false;
        }

        public function updatediscountItem(discount_item $discountItem) {
            $result = $this->discountItemDAL->updatediscountItem($discountItem);
            if($result) {
                $index = array_search($discountItem,$this->discountItemList,true);
                if($index !== false) {
                    $this->discountItemList[$index] = $discountItem;
                    return $index;
                }
            }
            return -1;
        }   

        public function deletediscountItem($id) {
            $discountItem = $this->getdiscountItemById($id);

            $check = $this->discountItemDAL->deletediscountItem($discountItem['id']);

            if($check) {
                $discountItemId = $discountItem['id'];
                unset($this->discountItemList[$discountItemId]);
            }else {
                throw new InvalidArgumentException('Invalid discountItem');
            }
            return $check;
        }

        public function filter(discount_item $discountItem,$value,$columns) {
            foreach($columns as $column) {
                switch(strtolower($column)) {
                    case 'id';
                        if(intval($value) == $discountItem->getId()) {
                            return true;
                        }
                        break;
                    case 'category_id':
                        if(intval($value) == $discountItem->getCategoryid()) {
                            return true;
                        }
                        break;
                    case 'discount_id':
                        if(intval($value) == $discountItem->getDiscountid()) {
                            return true;
                        }
                        break;
                    default: 
                    if($this->checkAllColumns($discountItem,$value)) {
                        return true;
                    }
                    break;
                }
            }
            return false;
        }

        public function checkAllColumns(discount_item $discountItem,$value) {
            return (
                $discountItem->getId() === intval($value) ||
                $discountItem->getCategoryid() === intval($value) ||
                $discountItem->getDiscountid() === intval($value)
            );
        }

        public function searchdiscountItem($value,$column) {
            $result = array();
            $listdiscountItem = $this->discountItemDAL->searchdiscountItem($value,$column);
            foreach($listdiscountItem as $discountItem) {
                if($this->filter($discountItem,$value,$column)) {
                    $result[] = $discountItem;
                }
            }

            if(count($result) <= 0) {
                throw new InvalidArgumentException('No discountItem found!!');
            }
            return $result;
        }
    }

?>