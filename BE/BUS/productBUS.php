<?php
    require_once(__DIR__ . '/../DAL/productDAL.php');
    require_once(__DIR__ . '/../DAL/orderItemDAL.php');

    class productBUS {
        private $productList = array();

        private static $instance;

        public static function getInstance() {
            if (!isset(self::$instance)) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function __construct() {
            $this->productList = array_merge($this->productList, productDAL::getInstance()->getAllProducts());
        }
        
        public function getAllProduct() {
            return $this->productList;
        }

        public function refreshData() {
            $this->productList = array_merge($this->productList, productDAL::getInstance()->getAllProducts());
        }

        public function getProductById($id) {
            foreach ($this->productList as $product) {
                if ($product['id'] == $id) {
                    return $product;
                }
            }  
            return null;
        }
        
        public function getTotal() {
            $count = 0;
            foreach ($this->productList as $product) {
                $count++;
            }
        
            return $count;
        }

        public function getMax() {
            $max = 0;
            foreach ($this->productList as $product) {
                $max++;
            }
        
            return $max + 1;
        }

        public function getPage($limit,$offset) {
            return productDAL::getInstance()->pageProducts($limit,$offset);
        }

        public function addProduct(product $product) {
            if(empty($product->getName() || $product->getName() === null) 
                || $product->getCategoryID() <= 0
                || empty($product->getImage()) || $product->getImage() === null
                || ($product->getGender() != 0 && $product->getGender() != 1)
                || $product->getPrice() <= 0
                || empty($product->getDescription()) || $product->getDescription() === null
            ){
                throw new InvalidArgumentException('Invalid information, check your input again!!');          
            }

            $newProduct = productDAL::getInstance()->addProduct($product);

            if($newProduct) {
                $this->productList[] = $product;
                return true;
            }
            return false;
        }

        public function updateProduct(product $product) {
            $result = productDAL::getInstance()->updateProduct($product);
            return $result;
        }

        public function deleteProduct($id) {
            $product = $this->getProductById($id);

            $check = productDAL::getInstance()->deleteProduct($product['id']);

            if($check) {
                $productId = $product['id'];
                unset($this->productList[$productId]);
            }else {
                throw new InvalidArgumentException('Invalid product');
            }
            return $check;
        }


        public function searchProduct($searchValue,$gender, $category_id, $min, $max) {
            return ProductDAL::getInstance()->searchProductWithConditions($searchValue,$gender, $category_id, $min, $max);
        }
        
        public function getNewestProducts() {
            $max = $this->getTotal();

            $listMax = [];
            foreach($this->productList as $product) {
                if($product['id'] == $max) {
                    $listMax[] = $product['id'];
                    break;
                }
            }

            foreach($this->productList as $product) {
                if($product['id'] + 1 == $max) {
                    $listMax[] = $product['id'];
                    break;
                }
            }

            foreach($this->productList as $product) {
                if($product['id'] + 2 == $max) {
                    $listMax[] = $product['id'];
                    break;
                }
            }
            return $listMax;
        }

        public function getAdviceProducts() {
            $listProduct = $this->getAllProduct();
            $quantity = count($listProduct);

            $random_1 = mt_rand(0,$quantity-1);
            $listAdvice[] = $listProduct[$random_1]['id'];

            do{
                $random_2 = mt_rand(0,$quantity-1);
            }while($random_2 == $random_1);
            $listAdvice[] = $listProduct[$random_2]['id'];

            do{
                $random_3 = mt_rand(0,$quantity-1);
            }while($random_3 == $random_1 || $random_3 == $random_2);
            $listAdvice[] = $listProduct[$random_3]['id'];

            return $listAdvice;
        }
    }


?>