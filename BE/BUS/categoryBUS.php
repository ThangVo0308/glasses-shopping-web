<?php
    require_once ('./BE/DAL/categoryDAL.php');
    class CategoryBUS {
        private $categoryList = array();

        private static $instance;

        public static function getInstance() {
            if (!isset(self::$instance)) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function __construct() {
            $this->categoryList = array_merge($this->categoryList,CategoryDAL::getInstance()->getAllCategory());
        }

        public function getAllCategory() {
            return $this->categoryList;
        }

        public function refreshData() {
            // $this->categoryDAL = new CategoryDAL();
            $this->categoryList = array_merge($this->categoryList,CategoryDAL::getInstance()->getAllCategory());
        }

        public function getCategoryById($id) {
            $this->refreshData();
            foreach($this->categoryList as $category) {
                if($category->getId() == $id) {
                    return $category;
                }
            }
            return null;
        }

        public function getCategoryByName($name) {
            $this->refreshData();
            foreach($this->categoryList as $category) {
                if($category->getName() == $name) {
                    return $category->getId();
                }
            }
            return null;
        }

            public function getListCategoryById($id) {
                return CategoryDAL::getInstance()->getCategoryByID($id);
            }



        public function addCategory(categories $category) {
            if(empty($category->getName())) {
                throw new InvalidArgumentException('Invalid information, check your input!!');
            }

            $newCategory = CategoryDAL::getInstance()->addCategory($category);
            if($newCategory) {
                $this->categoryList[] = $category;
                return true;
            }
            return false;
        }

        public function updateCategory(categories $category) {
            $result = CategoryDAL::getInstance()->updateCategory($category);
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

            $check = CategoryDAL::getInstance()->deleteCategory($category['id']);

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
                        if(stripos($category->getName(), $value) !== false) {
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
            $columnString = implode(",", $column);

            $listCategory = CategoryDAL::getInstance()->searchCategory($value,$columnString);
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