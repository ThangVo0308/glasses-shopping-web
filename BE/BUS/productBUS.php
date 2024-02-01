<?php
    // require("..\BE\DAL\productDAL.php");
    require_once ("..\BE\DAL\productDAL.php");
    class productBUS {
        private $productList = array();
        private $productDAL;

        public function __construct() {
            $this->productDAL = new ProductDAL();
            $this->productList = array_merge($this->productList, $this->productDAL->getAllProducts());
        }
        
        public function getAllProduct() {
            return $this->productList;
        }

        public function refreshData() {
            $this->productDAL = new ProductDAL();
            $this->productList = array_merge($this->productList, $this->productDAL->getAllProducts());
        }

        public function getProductById($id) {
            foreach ($this->productList as $product) {
                if ($product['id'] == $id) {
                    return $product;
                }
            }  
            return null;
        }
        

        public function getMax() {
            $max = 0;
            foreach ($this->productList as $product) {
                $max++;
            }
        
            return $max + 1;
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

            if($newProduct) {
                $this->productList[] = $product;
                return true;
            }
            return false;
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

            $check = $this->productDAL->deleteProduct($product['id']);

            if($check) {
                $productId = $product['id'];
                unset($this->productList[$productId]);
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
                        break;
                    case 'name':
                        if (stripos($product->getName(), $value) !== false) {
                            return true;
                        }
                        break;
                    case 'category_id':
                        if(intval($value) === $product->getCaterogyID()) {
                            return true;
                        }
                        break;
                    case 'price':
                        if(doubleval($value) === $product->getPrice()) {
                            return true;
                        }
                        break;
                    default: 
                    if($this->checkAllColumns($product,$value)) {
                        return true;
                    }
                    break;
                }
            }
            return false;
        }

        public function checkAllColumns(product $product,$value) {
            return (
                $product->getId() === intval($value) ||
                $product->getCaterogyID() === intval($value) ||
                doubleval($product->getPrice()) === doubleval($value) ||
                stripos($product->getName(), $value) !== false // $ strtolower($product->getname)
            );
        }

        public function searchProduct($value,$column) {
            $results = array();
            $columnString = implode(",", $column);

            $listProduct = $this->productDAL->searchProduct($value,$columnString);
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
