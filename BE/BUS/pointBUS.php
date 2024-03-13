<?php
    // require("..\BE\DAL\pointDAL.php");
    require_once(__DIR__ . '/../DAL/pointDAL.php');
    require_once(__DIR__ . '/../DAL/userDAL.php');
    class pointBUS {
        private $pointList = array();

        private static $instance;

        public static function getInstance() {
            if (!isset(self::$instance)) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function __construct() {
            $this->pointList = array_merge($this->pointList, pointDAL::getInstance()->getAllPoint());
        }
        
        public function getAllpoint() {
            return $this->pointList;
        }

        public function refreshData() {
            $this->pointList = array_merge($this->pointList, pointDAL::getInstance()->getAllPoint());
        }

        public function getPointById($id) {
            foreach ($this->pointList as $point) {
                if ($point['id'] == $id) {
                    return $point;
                }
            } 
            return null;
        }

        public function getPointByUserID($userID) {
            foreach ($this->pointList as $point) {
                if ($point['user_id'] == $userID) {
                    return $point;
                }
            } 
            return null;
        }
        

        public function getMax() {
            $max = 0;
            foreach ($this->pointList as $point) {
                $max++;
            }
        
            return $max + 1;
        }

        public function addPoint(points $point) {
            if($point->getUserid() <= 0
                || $point->getPointsearned() < 0
                || $point->getPointsused() < 0
            ){
                throw new InvalidArgumentException('Invalid information, check your input again!!');          
            }

            $newpoint = pointDAL::getInstance()->addPoint($point);

            if($newpoint) {
                $this->pointList[] = $point;
                return true;
            }
            return false;
        }

        public function updatePoint(points $point) {
            $result = pointDAL::getInstance()->updatePoint($point);
            return $result;
        }

        public function deletePoint($id) {
            $point = $this->getpointById($id);

            $check = pointDAL::getInstance()->deletePoint($point['id']);

            if($check) {
                $pointId = $point['id'];
                unset($this->pointList[$pointId]);
            }else {
                throw new InvalidArgumentException('Invalid point');
            }
            return $check;
        }

        public function filter(points $point,$value,$columns) {
            foreach($columns as $column) {
                switch(strtolower($column)) {
                    case 'id':
                        if(intval($value) === $point->getID()) {
                            return true;
                        }
                        break;
                    case 'user_id':
                        if (intval($value) === $point->getUserid()) {
                            return true;
                        }
                        break;
                    case 'points_earned':
                        if(intval($value) === $point->getPointsearned()) {
                            return true;
                        }
                        break;
                    case 'points_used':
                        if(intval($value) === $point->getPointsused()) {
                            return true;
                        }
                        break;
                    default: 
                    if($this->checkAllColumns($point,$value)) {
                        return true;
                    }
                    break;
                }
            }
            return false;
        }

        public function checkAllColumns(points $point,$value) {
            return (
                $point->getId() === intval($value) ||
                $point->getUserid() === intval($value) ||
                $point->getPointsearned() === intval($value) ||
                $point->getPointsused() === intval($value)
            );
        }

        public function searchPoint($value,$column) {
            $results = array();
            $columnString = implode(",", $column);

            $listpoint = pointDAL::getInstance()->searchPoint($value,$columnString);
            foreach($listpoint as $point) {
                if($this->filter($point,$value,$column)) {
                    $results[] = $point;
                } 
            }
            if(count($results) <= 0) {
                throw new InvalidArgumentException('No point found!!'); 
            }
            return $results;
        }

    }
?>