<?php
    // require("..\BE\DAL\orderItemDAL.php");
    require_once ("..\BE\DAL\orderItemDAL.php");
    class orderItemBUS {
        private $orderItemList = array();
        private $orderItemDAL;

        public function __construct() {
            $this->orderItemDAL = new orderItemDAL();
            $this->orderItemList = array_merge($this->orderItemList, $this->orderItemDAL->getAllOrderItem());
        }
        
        public function getAllorderItem() {
            return $this->orderItemList;
        }

        public function refreshData() {
            $this->orderItemDAL = new orderItemDAL();
            $this->orderItemList = array_merge($this->orderItemList, $this->orderItemDAL->getAllOrderItem());
        }

        public function getorderItemById($id) {
            foreach ($this->orderItemList as $orderItem) {
                if ($orderItem['id'] == $id) {
                    return $orderItem;
                }
            } 
            return null;
        }
        

        public function getMax() {
            $max = 0;
            foreach ($this->orderItemList as $orderItem) {
                $max++;
            }
        
            return $max + 1;
        }

        public function addOrderItem(order_items $orderItem) {
            if($orderItem->getOrderid() <= 0
                || $orderItem->getProductid() <= 0
                || $orderItem->getQuantity() <= 0
                || $orderItem->getPrice() <= 0
            ){
                throw new InvalidArgumentException('Invalid information, check your input again!!');          
            }

            $neworderItem = $this->orderItemDAL->addOrderItem($orderItem);

            if($neworderItem) {
                $this->orderItemList[] = $orderItem;
                return true;
            }
            return false;
        }

        public function updateOrderItem(order_items $orderItem) {
            $result = $this->orderItemDAL->updateOrderItem($orderItem);
            if($result) {
                $index = array_search($orderItem,$this->orderItemList,true);
                if($index !== false) {
                    $this->orderItemList[$index] = $orderItem;
                    return $index;
                }
            }
            return -1;
        }

        public function deleteOrderItem($id) {
            $orderItem = $this->getorderItemById($id);

            $check = $this->orderItemDAL->deleteOrderItem($orderItem['id']);

            if($check) {
                $orderItemId = $orderItem['id'];
                unset($this->orderItemList[$orderItemId]);
            }else {
                throw new InvalidArgumentException('Invalid orderItem');
            }
            return $check;
        }

        public function filter(order_items $orderItem,$value,$columns) {
            foreach($columns as $column) {
                switch(strtolower($column)) {
                    case 'id':
                        if(intval($value) === $orderItem->getID()) {
                            return true;
                        }
                        break;
                    case 'order_id':
                        if (intval($value) === $orderItem->getOrderid()) {
                            return true;
                        }
                        break;
                    case 'product_id':
                        if(intval($value) === $orderItem->getProductid()) {
                            return true;
                        }
                        break;
                    case 'quantity':
                        if(intval($value) === $orderItem->getQuantity()) {
                            return true;
                        }
                        break;
                    case 'price':
                        if(doubleval($value) === $orderItem->getPrice()) {
                            return true;
                        }
                        break;
                    default: 
                    if($this->checkAllColumns($orderItem,$value)) {
                        return true;
                    }
                    break;
                }
            }
            return false;
        }

        public function checkAllColumns(order_items $orderItem,$value) {
            return (
                $orderItem->getId() === intval($value) ||
                $orderItem->getOrderid() === intval($value) ||
                $orderItem->getProductid() === intval($value) || 
                $orderItem->getQuantity() === intval($value) ||
                doubleval($orderItem->getPrice()) === doubleval($value)
            );
        }

        public function searchOrderItem($value,$column) {
            $results = array();
            $columnString = implode(",", $column);

            $listorderItem = $this->orderItemDAL->searchOrderItem($value,$columnString);
            foreach($listorderItem as $orderItem) {
                if($this->filter($orderItem,$value,$column)) {
                    $results[] = $orderItem;
                }
            }
            if(count($results) <= 0) {
                throw new InvalidArgumentException('No orderItem found!!');
            }
            return $results;
        }

    }
?>
