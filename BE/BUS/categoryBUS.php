<?php
    require_once ('./BE/DAL/categoryDAL.php');
    class CategoryBUS {
        private $categoryList = array();
        private $categoryDAL;

        public function __construct($categoryDAL) {
            $this->categoryDAL = new CategoryDAL();
        }

        public function getAllCategory() {
            return $this->categoryDAL->getAllCategory();
        }

        public function refreshData() {
            $this->categoryList = $this->categoryDAL->getAllCategory();
        }

        public function getCategoryById($id) {
            $this->refreshData();
            foreach($this->categoryList as $category) {
                if($category->getId() == $id) {
                    return $id;
                }
            }
            return null;
        }

        public function addCategory(categories $category) {
            if(empty($category->getName())) {
                throw new InvalidArgumentException('Invalid information, check your input!!');
            }

            $newCategory = $this->categoryDAL->addCategory($category);
            if($newCategory) {
                $this->categoryList[] = $category;
                return true;
            }
            return false;
        }

        public function updateCategory(categories $category) {
            $result = $this->categoryDAL->updateCategory($category);
            if($result) {
                $index = array_search($category,$this->categoryList,true);
                if($index !== false) {
                    $this->categoryList[$index] = $category;
                    return $index;
                }
            }
            return -1;
        }   

        public function deleteCategory($id) {
            $category = $this->getCategoryById($id);

            $check = $this->categoryDAL->deleteCategory($category['id']);

            if($check) {
                $categoryId = $category['id'];
                unset($this->categoryList[$categoryId]);
            }else {
                throw new InvalidArgumentException('Invalid category');
            }
            return $check;
        }

        public function filter(categories $category,$value,$columns) {
            foreach($columns as $column) {
                switch(strtolower($column)) {
                    case 'id';
                        if(intval($value) == $category->getId()) {
                            return true;
                        }
                        break;
                    case 'name':
                        if($value === $category->getName()) {
                            return true;
                        }
                        break;
                    default: 
                    if($this->checkAllColumns($category,$value)) {
                        return true;
                    }
                        break;
                }
            }
            return false;
        }

        public function checkAllColumns(categories $categories,$value) {
            return (
                $categories->getId() == intval($value) ||
                stripos($categories->getName(),$value)
            );
        }

        public function searchCategory($value,$column) {
            $result = array();
            $listCategory = $this->categoryDAL->searchCategory($value,$column);
            foreach($listCategory as $category) {
                if($this->filter($category,$value,$column)) {
                    $result[] = $category;
                }
            }

            if(count($result) <= 0) {
                throw new InvalidArgumentException('No category found!!');
            }
            return $result;
        }
    }

?>