<?php
    // require("..\BE\DAL\orderItemDAL.php");
    require_once(__DIR__ . '/../DAL/orderItemDAL.php');
    class orderItemBUS {
        private $orderItemList = array();

        private static $instance;

        public static function getInstance() {
            if (!isset(self::$instance)) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function __construct() {
            $this->orderItemList = array_merge($this->orderItemList, orderItemDAL::getInstance()->getAllOrderItem());
        }
        
        public function getAllorderItem() {
            return $this->orderItemList;
        }

        public function refreshData() {
            $this->orderItemList = array_merge($this->orderItemList, orderItemDAL::getInstance()->getAllOrderItem());
        }

        public function getorderItemById($id) {
            foreach ($this->orderItemList as $orderItem) {
                if ($orderItem['id'] == $id) {
                    return $orderItem;
                }
            } 
            return null;
        }

        public function getorderItemByOrderId($id) {
            $list = array();
            foreach ($this->orderItemList as $orderItem) {
                if ($orderItem['order_id'] == $id) {
                    $list[] = $orderItem;
                }
            } 
            return $list;
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

            $neworderItem = orderItemDAL::getInstance()->addOrderItem($orderItem);

            if($neworderItem) {
                $this->orderItemList[] = $orderItem;
                return true;
            }
            return false;
        }

        public function updateOrderItem(order_items $orderItem) {
            $result = orderItemDAL::getInstance()->updateOrderItem($orderItem);
            return $result;
        }

        public function deleteOrderItem($id) {
            $orderItem = $this->getorderItemById($id);

            $check = orderItemDAL::getInstance()->deleteOrderItem($orderItem['id']);

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

            $listorderItem = orderItemDAL::getInstance()->searchOrderItem($value,$columnString);
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

        public function getTotal() {
            $count = 0;
            foreach ($this->orderItemList as $product) {
                $count++;
            }
        
            return $count;
        }

        public function getSoldOutProducts() {
            $max1 = 0; $result1 = 0;$idCount_1 = [];
            $listSoldOut = [];
        
            // top 1
            foreach($this->getAllorderItem() as $item) {
                $itemId = $item['product_id'];
        
                if (!isset($idCount_1[$itemId])) {
                    $idCount_1[$itemId] = 1;
                } else {
                    $idCount_1[$itemId]++;
                }

                if($idCount_1[$itemId] > $max1) {
                    $max1 = $idCount_1[$itemId];
                    $result1 = $itemId;
                }else if($idCount_1[$itemId] == $max1) {
                    if($itemId > $result1) {
                        $result1 = $itemId;
                    }
                }
            }
            $listSoldOut[] = $result1;

            // top 2
            $max2 = 0; $result2 = 0;$idCount_2 = [];

            foreach($this->getAllorderItem() as $item) {
                $itemId = $item['product_id'];
        
                if (!isset($idCount_2[$itemId])) {
                    $idCount_2[$itemId] = 1;
                } else {
                    $idCount_2[$itemId]++;
                }

                if($idCount_2[$itemId] > $max2 && $idCount_2[$itemId] < $idCount_1[$listSoldOut[0]]) {
                    $max2 = $idCount_2[$itemId];
                    $result2 = $itemId;
                }else if($idCount_2[$itemId] == $max2 && $idCount_2[$itemId] < $idCount_1[$listSoldOut[0]]) {
                    if($itemId < $result2) {
                        $result2 = $itemId;
                    }
                }
            }
            $listSoldOut[] = $result2;

            // top 3
            $max3 = 0; $result3 = 0;$idCount_3 = [];

            foreach($this->getAllorderItem() as $item) {
                $itemId = $item['product_id'];
                if (!isset($idCount_3[$itemId])) {
                    $idCount_3[$itemId] = 1;
                } else {
                    $idCount_3[$itemId]++;
                }

                if($idCount_3[$itemId] >= $max3 && ($itemId != $result1 && $itemId != $result2) && $idCount_3[$itemId] < $idCount_1[$listSoldOut[0]] && $idCount_3[$itemId] < $idCount_2[$listSoldOut[1]]) {
                    $max3 = $idCount_3[$itemId];
                    $result3 = $itemId;
                }
            }
            $listSoldOut[] = $result3;

            return $listSoldOut;
        }
        

    }
?>