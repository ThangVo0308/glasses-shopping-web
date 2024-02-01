<?php
    require_once ("..\BE\DAL\importDAL.php");
    class importBUS {
        private $importList = array();
        private $importDAL;

        public function __construct() {
            $this->importList = new importDAL();
            $this->importList = array_merge($this->importList, $this->importDAL->getAllImport());
        }
        
        public function getAllImport() {
            return $this->importList;
        }

        public function refreshData() {
            $this->importDAL = new importDAL();
            $this->importList = array_merge($this->importList, $this->importDAL->getAllImport());
        }

        public function getImportById($id) {
            foreach ($this->importList as $import) {
                if ($import['id'] == $id) {
                    return $import;
                }
            } 
            return null;
        }
        

        public function getMax() {
            $max = 0;
            foreach ($this->importList as $import) {
                $max++;
            }
        
            return $max + 1;
        }

        public function addImport(imports $import) {
            if($import->getUserid() <= 0
                || strtotime($import->getImportdate()) <= 0 && strtotime($import->getImportdate()) > time()
                || $import->getPrice() < 0
            ){
                throw new InvalidArgumentException('Invalid information, check your input again!!');          
            }

            $newimport = $this->importDAL->addimport($import);

            if($newimport) {
                $this->importList[] = $import;
                return true;
            }
            return false;
        }

        public function updateImport(imports $import) {
            $result = $this->importDAL->updateImport($import);
            if($result) {
                foreach($this->importList as $index => $item) {
                    if($item['id'] == $import->getId()) {
                        $this->importList[$index] = $import;
                        return $index;
                    }
                }
                
            }
            return -1;
        }

        public function deleteimport($id) {
            $import = $this->getimportById($id);

            $check = $this->importDAL->deleteimport($import['id']);

            if($check) {
                $importId = $import['id'];
                unset($this->importList[$importId]);
            }else {
                throw new InvalidArgumentException('Invalid import');
            }
            return $check;
        }

        public function filter(imports $import,$value,$columns) {
            foreach($columns as $column) {
                switch(strtolower($column)) {
                    case 'id':
                        if(intval($value) === $import->getID()) {
                            return true;
                        }
                        break;
                    case 'user_id':
                        if (intval($value) === $import->getUserid()) {
                            return true;
                        }
                        break;
                    case 'import_date':
                        if(strtotime($value) === $import->getImportdate()) {
                            return true;
                        }
                        break;
                    case 'price':
                        if(doubleval($value) === $import->getPrice()) {
                            return true;
                        }
                        break;
                    default: 
                    if($this->checkAllColumns($import,$value)) {
                        return true;
                    }
                    break;
                }
            }
            return false;
        }

        public function checkAllColumns(imports $import,$value) {
            return (
                $import->getId() === intval($value) ||
                $import->getUserid() === intval($value) ||
                $import->getImportdate() === strtotime($value) ||
                doubleval($import->getPrice()) === doubleval($value)  
            );
        }

        public function searchimport($value,$column) {
            $results = array();
            $columnString = implode(",", $column);

            $listimport = $this->importDAL->searchimport($value,$columnString);
            foreach($listimport as $import) {
                if($this->filter($import,$value,$column)) {
                    $results[] = $import;
                }
            }
            if(count($results) <= 0) {
                throw new InvalidArgumentException('No import found!!');
            }
            return $results;
        }

    }
?>
