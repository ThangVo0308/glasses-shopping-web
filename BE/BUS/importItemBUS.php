<?php
    // require("..\BE\DAL\importItemDAL.php");
    require_once ("..\BE\DAL\importItemDAL.php");
    class importItemBUS {
        private $importItemList = array();

        private static $instance;

        public static function getInstance() {
            if (!isset(self::$instance)) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function __construct() {
            $this->importItemList = array_merge($this->importItemList, importItemDAL::getInstance()->getAllImportItem());
        }
        
        public function getAllimportItem() {
            return $this->importItemList;
        }

        public function refreshData() {
            $this->importItemList = array_merge($this->importItemList, importItemDAL::getInstance()->getAllImportItem());
        }

        public function getimportItemById($id) {
            foreach ($this->importItemList as $importItem) {
                if ($importItem['id'] == $id) {
                    return $importItem;
                }
            } 
            return null;
        }
        

        public function getMax() {
            $max = 0;
            foreach ($this->importItemList as $importItem) {
                $max++;
            }
        
            return $max + 1;
        }

        public function addimportItem(imports_item $importItem) {
            if($importItem->getImportid() <= 0
                || $importItem->getProductid() <=0 
                || $importItem->getQuantity() <= 0
                || $importItem->getPrice() <= 0
            ){
                throw new InvalidArgumentException('Invalid information, check your input again!!');          
            }

            $newimportItem = importItemDAL::getInstance()->addImportItem($importItem);

            if($newimportItem) {
                $this->importItemList[] = $importItem;
                return true;
            }
            return false;
        }

        public function updateimportItem(imports_item $importItem) {
            $result = importItemDAL::getInstance()->updateImportItem($importItem);
            if($result) {
                $index = array_search($importItem,$this->importItemList,true);
                if($index !== false) {
                    $this->importItemList[$index] = $importItem;
                    return $index;
                }
            }
            return -1;
        }

        public function deleteimportItem($id) {
            $importItem = $this->getimportItemById($id);

            $check = importItemDAL::getInstance()->deleteImportItem($importItem['id']);

            if($check) {
                $importItemId = $importItem['id'];
                unset($this->importItemList[$importItemId]);
            }else {
                throw new InvalidArgumentException('Invalid importItem');
            }
            return $check;
        }

        public function filter(imports_item $importItem,$value,$columns) {
            foreach($columns as $column) {
                switch(strtolower($column)) {
                    case 'id':
                        if(intval($value) === $importItem->getID()) {
                            return true;
                        }
                        break;
                    case 'import_id':
                        if (intval($value) === $importItem->getImportid()) {
                            return true;
                        }
                        break;
                    case 'product_id':
                        if(intval($value) === $importItem->getProductid()) {
                            return true;
                        }
                        break;
                    case 'quantity':
                        if(intval($value) === $importItem->getQuantity()) {
                            return true;
                        }
                        break;
                    case 'price':
                        if(doubleval($value) === $importItem->getPrice()) {
                            return true;
                        }
                        break;
                    default: 
                    if($this->checkAllColumns($importItem,$value)) {
                        return true;
                    }
                    break;
                }
            }
            return false;
        }

        public function checkAllColumns(imports_item $importItem,$value) {
            return (
                $importItem->getId() === intval($value) ||
                $importItem->getImportid() === intval($value) ||
                $importItem->getProductid() === intval($value) ||
                $importItem->getQuantity() === intval($value) ||
                doubleval($importItem->getPrice()) === doubleval($value)  
            );
        }

        public function searchimportItem($value,$column) {
            $results = array();
            $columnString = implode(",", $column);

            $listimportItem = importItemDAL::getInstance()->searchimportItem($value,$columnString);
            foreach($listimportItem as $importItem) {
                if($this->filter($importItem,$value,$column)) {
                    $results[] = $importItem;
                }
            }
            if(count($results) <= 0) {
                throw new InvalidArgumentException('No importItem found!!');
            }
            return $results;
        }

    }
?>
