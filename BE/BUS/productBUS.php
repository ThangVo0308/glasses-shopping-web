<?php
    require_once ('./BE/DAL/productDAL.php');
    class productBUS {
        private $productList = array();
        private $productDAL;

        public function __construct($productDAL) {
            $this->productDAL = new productDAL();
        }

        public function getAllProduct() {
            return $this->productDAL->getAllProducts();
        }

        public function refreshData() {
            $this->productList = $this->productDAL->getAllProducts();
        }

        public function getProductById($id) {
            $this->refreshData();
            foreach($this->productList as $product) {
                if($product->getId() == $id) {
                    return $id;
                }
            } 
            return null;
        }


        public function addProduct(product $product) {
            if(empty($product->getName() || $product->getName() === null) 
                || $product->getCaterogyID() <= 0
                || empty($product->getImage()) || $product->getImage() === null
                || ($product->getGender() != 0 && $product->getGender() != 1)
                || $product->getPrice() <= 0
                || empty($product->getDescription()) || $product->getDescription() === null
            ){
                throw new InvalidArgumentException('Invalid information, check your input again!!');          
            }
            $newProduct = $this->productDAL->addProduct($product);
            return $newProduct;
        }

        public function updateProduct(product $product) {
            $result = $this->productDAL->updateProduct($product);
            if($result) {
                $index = array_search($product,$this->productList,true);
                if($index !== false) {
                    $this->productList[$index] = $product;
                    return $index;
                }
            }
            return -1;
        }

        public function deleteProduct($id) {
            $product = $this->getProductById($id);

            $check = $this->productDAL->deleteProduct($product);

            if($check) {
                $result = array_search($product,$this->productList,true);
                unset($this->productList[$result]);
            }else {
                throw new InvalidArgumentException('Invalid product');
            }
            return $check;
        }

        public function filter(product $product,$value,$columns) {
            foreach($columns as $column) {
                switch(strtolower($column)) {
                    case 'id':
                        if(intval($value) === $product->getID()) {
                            return true;
                        }
                    case 'name':
                        if($value === $product->getName()) {
                            return true;
                        }
                    case 'category_id':
                        if(intval($value) === $product->getCaterogyID()) {
                            return true;
                        }
                    case 'price':
                        if(doubleval($value) === $product->getPrice()) {
                            return true;
                        }
                    default: 
                    if($this->checkAllColumns($product,$value)) {
                        return true;
                    }
                }
            }
            return false;
        }

        public function checkAllColumns(product $product,$value) {
            return (
                $product->getId() == intval($value) ||
                $product->getCaterogyID() == intval($value) ||
                doubleval($product->getPrice()) == doubleval($value) ||
                stripos($product->getName(), $value) !== false // $ strtolower($product->getname)
            );
        }

        public function searchProduct($value,$column) {
            $results = array();
            $listProduct = $this->productDAL->searchProduct($value,$column);
            foreach($listProduct as $product) {
                if($this->filter($product,$value,$column)) {
                    $results[] = $product;
                }
            }
            if(count($results) <= 0) {
                throw new InvalidArgumentException('No product found!!');
            }
            return $results;
        }







    }
?>