<?php
    require("..\BE\DAL\database.php");
    class ProductDAL {
        private $connection;

        public function __construct() {
            global $connection;
            $this->connection = $connection;
        }

        public function getAllProducts() {
            try {
                $query = "select * from products";
                $statement = $this->connection->query($query);
                $statement->execute();
                $listProduct = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $listProduct;
            }catch(PDOException $e) {
                echo "Query failed: ".$e->getMessage();
                return false;
            }
        }

        public function addProduct(Product $product) {
            try{
                $query = "insert into products (name,category_id,image,gender,price,description,status) 
                         values (:name,:category_id,:image,:gender,:price,:description,:status)";
                $statement = $this->connection->prepare($query);
                $statement->bindParam(':name',$product->getName());
                $statement->bindParam(':category_id',$product->getCaterogyID());
                $statement->bindParam(':image',$product->getImage());
                $statement->bindParam(':gender',$product->getGender());
                $statement->bindParam(':price',$product->getPrice());
                $statement->bindParam(':description',$product->getDescription());
                $statement->bindParam(':status',$product->getStatus());
                $statement->execute();
                return true;
            }catch(PDOException $e) {
                echo "Add failed: ".$e->getMessage();
                return false;
            }
        }

        public function updateProduct(Product $product) {
            try {
                $query = "update products set name=?, category_id = ?, image=?, gender=?, price=?, description=?, status=? where id=?";
                $statement = $this->connection->prepare($query);

                $name = $product->getName();
                $category_id = $product->getCaterogyID();
                $image = $product->getImage();
                $gender =$product->getGender();
                $price = $product->getPrice();
                $description = $product->getDescription();
                $status = $product->getStatus();
                $id = $product->getID();

                $statement->bindParam(1,$name);
                $statement->bindParam(2,$category_id);
                $statement->bindParam(3,$image);
                $statement->bindParam(4,$gender);
                $statement->bindParam(5,$price);
                $statement->bindParam(6,$description);
                $statement->bindParam(7,$status);
                $statement->bindParam(8,$id);

                $statement->execute();
                return true;
            }catch(PDOException $e) {
                echo "Update failed: ".$e->getMessage();
                return false;
            }
        }

        public function deleteProduct($id) {
            try {
                $query = "update products set status = 'banned' where id = ?";
                $statement = $this->connection->prepare($query);

                $statement->bindValue(1, $id, PDO::PARAM_INT);
                $statement->execute();

                return true;
            }catch(PDOException $e) {
                echo "Delete failed: ".$e->getMessage();
                return false;
            }
        }

        public function createProductFromRow($row) {
            $product = new product();
            $product->setId($row['id']);
            $product->setName($row['name']);
            $product->setCategoryId($row['category_id']);
            $product->setCategoryId($row['image']);
            $product->setCategoryId($row['gender']);
            $product->setCategoryId($row['price']);
            $product->setCategoryId($row['description']);
            $product->setCategoryId($row['status']);
    
            return $product;
        }

        public function searchProduct($condition, $columnName) {
    try {
        $productList = array();

        if ($columnName == null || strlen($columnName) == 0) {
            $query = "SELECT * FROM products WHERE CONCAT(id, name, category_id, image, gender, price, description, status) LIKE ?";
        } else if (strlen($columnName) == 1) {
            $column = $columnName[0]; // selected column
            $query = "SELECT * FROM products WHERE " . $column . " LIKE ?";
        } else {
            if (!is_array($columnName)) {
                $columnName = array($columnName);
            }

            $columns = implode(",", $columnName);
            $query = "SELECT id, name, category_id, image, gender, price, description, status FROM products WHERE CONCAT(" . $columns . ") LIKE ?";
        }

        $statement = $this->connection->prepare($query);
        if ($condition != null) {
            $searchCondition = "%" . $condition . "%";
            $statement->bindParam(1, $searchCondition);
        }

        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $product) {
            $product1 = $this->createProductFromRow($product);
            $productList[] = $product1;
        }
        return $productList;
    } catch (PDOException $e) {
        echo "Search failed" . $e->getMessage();
        return array();
    }
}

        
        
    }    


?>



