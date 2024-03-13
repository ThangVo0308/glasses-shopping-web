<?php
    require_once(__DIR__ . '/../DAL/orderDAL.php');
    class orderBUS {
        private $orderList = array();

        private static $instance;

        public static function getInstance() {
            if (!isset(self::$instance)) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function __construct() {
            $this->orderList = array_merge($this->orderList, orderDAL::getInstance()->getAllOrder());
        }
        
        public function getAllorder() {
            return $this->orderList;
        }

        public function refreshData() {
            $this->orderList = array_merge($this->orderList, orderDAL::getInstance()->getAllOrder());
        }

        public function getOrderById($id) {
            foreach ($this->orderList as $order) {
                if ($order['id'] == $id) {
                    return $order;
                }
            } 
            return null;
        }
        

        public function getMax() {
            $max = 0;
            foreach ($this->orderList as $order) {
                $max++;
            }
        
            return $max + 1;
        }

        public function addOrder(orders $order) {
            if($order->getUserid() <= 0
                || strtotime($order->getOrderdate() <= 0) && strtotime($order->getOrderdate()) > time()
                || $order->getTotalprice() <= 0
            ){
                throw new InvalidArgumentException('Invalid information, check your input again!!');          
            }

            $neworder = orderDAL::getInstance()->addOrder($order);

            if($neworder) {
                $this->orderList[] = $order;
                return true;
            }
            return false;
        }

        public function updateOrder(orders $order) {
            $result = orderDAL::getInstance()->updateOrder($order);
            if($result) {
                $index = array_search($order,$this->orderList,true);
                if($index !== false) {
                    $this->orderList[$index] = $order;
                    return $index;
                }
            }
            return -1;
        }

        public function deleteOrder($id) {
            $order = $this->getorderById($id);

            $check = orderDAL::getInstance()->deleteOrder($order['id']);

            if($check) {
                $orderId = $order['id'];
                unset($this->orderList[$orderId]);
            }else {
                throw new InvalidArgumentException('Invalid order');
            }
            return $check;
        }

        public function filter(orders $order,$value,$columns) {
            foreach($columns as $column) {
                switch(strtolower($column)) {
                    case 'id':
                        if(intval($value) === $order->getID()) {
                            return true;
                        }
                        break;
                    case 'user_id':
                        if (intval($value) === $order->getUserid()) {
                            return true;
                        }
                        break;
                    case 'order_date':
                        if(strtotime($value) === $order->getOrderdate()) {
                            return true;
                        }
                        break;
                    case 'total_price':
                        if(doubleval($value) === $order->getTotalprice()) {
                            return true;
                        }
                        break;
                    default: 
                    if($this->checkAllColumns($order,$value)) {
                        return true;
                    }
                    break;
                }
            }
            return false;
        }

        public function checkAllColumns(orders $order,$value) {
            return (
                $order->getId() === intval($value) ||
                $order->getUserid() === intval($value) ||
                $order->getOrderdate() === strtotime($value) ||
                doubleval($order->getTotalprice()) === doubleval($value)  
            );
        }

        public function searchOrder($value,$column) {
            $results = array();
            $columnString = implode(",", $column);

            $listorder = orderDAL::getInstance()->searchOrder($value,$columnString);
            foreach($listorder as $order) {
                if($this->filter($order,$value,$column)) {
                    $results[] = $order;
                }
            }
            if(count($results) <= 0) {
                throw new InvalidArgumentException('No order found!!');
            }
            return $results;
        }

    }
?>
