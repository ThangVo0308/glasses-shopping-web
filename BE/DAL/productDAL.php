<?php
    require_once(__DIR__ . '/../DAL/database.php');
    class ProductDAL
{
    private $connection;

    private static $instance;

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __construct()
    {
        global $connection;
        $this->connection = $connection;
    }

    public function getAllProducts()
    {
        try {
            $query = "select * from products";
            $statement = $this->connection->query($query);
            $statement->execute();
            $listProduct = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $listProduct;
        } catch (PDOException $e) {
            echo "Query failed: " . $e->getMessage();
            return false;
        }
    }

    public function pageProducts($limit, $offset)
    {
        try {
            $query = "SELECT * FROM products ORDER BY id ASC LIMIT ? OFFSET ?";
            $statement = $this->connection->prepare($query);
            $statement->bindParam(1, $limit);
            $statement->bindParam(2, $offset);
            $statement->execute();
            $listProduct = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $listProduct;
        } catch (PDOException $e) {
            echo "Query failed: " . $e->getMessage();
            return false;
        }
    }


    public function addProduct(Product $product)
    {
        try {
            $query = "insert into products (name,category_id,image,gender,price,description,quantity,status) 
                         values (:name,:category_id,:image,:gender,:price,:description,:quantity,:status)";
            $statement = $this->connection->prepare($query);
            $statement->bindParam(':name', $product->getName());
            $statement->bindParam(':category_id', $product->getCategoryID());
            $statement->bindParam(':image', $product->getImage());
            $statement->bindParam(':gender', $product->getGender());
            $statement->bindParam(':price', $product->getPrice());
            $statement->bindParam(':description', $product->getDescription());
            $statement->bindParam(':quantity', $product->getQuantity());
            $statement->bindParam(':status', $product->getStatus());
            $statement->execute();
            return true;
        } catch (PDOException $e) {
            echo "Add failed: " . $e->getMessage();
            return false;
        }
    }

    public function updateProduct(Product $product)
    {
        try {
            $query = "update products set name=?, category_id = ?, image=?, gender=?, price=?, description=?, quantity=?, status=? where id=?";
            $statement = $this->connection->prepare($query);

            $name = $product->getName();
            $category_id = $product->getCategoryID();
            $image = $product->getImage();
            $gender = $product->getGender();
            $price = $product->getPrice();
            $description = $product->getDescription();
            $quantity = $product->getQuantity();
            $status = $product->getStatus();
            $id = $product->getID();

            $statement->bindParam(1, $name);
            $statement->bindParam(2, $category_id);
            $statement->bindParam(3, $image);
            $statement->bindParam(4, $gender);
            $statement->bindParam(5, $price);
            $statement->bindParam(6, $description);
            $statement->bindParam(7, $quantity);
            $statement->bindParam(8, $status);
            $statement->bindParam(9, $id);

            $statement->execute();
            return true;
        } catch (PDOException $e) {
            echo "Update failed: " . $e->getMessage();
            return false;
        }
    }

    public function deleteProduct($id)
    {
        try {
            $query = "update products set status = 'banned' where id = ?";
            $statement = $this->connection->prepare($query);

            $statement->bindValue(1, $id, PDO::PARAM_INT);
            $statement->execute();

            return true;
        } catch (PDOException $e) {
            echo "Delete failed: " . $e->getMessage();
            return false;
        }
    }

    public function createProductFromRow($row)
    {
        $product = new product();
        $product->setId($row['id']);
        $product->setName($row['name']);
        $product->setCategoryId($row['category_id']);
        $product->setImage($row['image']);
        $product->setGender($row['gender']);
        $product->setPrice($row['price']);
        $product->setDescription($row['description']);
        $product->setQuantity($row['quantity']);
        $product->setStatus($row['status']);

        return $product;
    }

    public function searchProductWithConditions($searchValue,$gender, $category_id, $min, $max)
    {
        try {
            $productList = array();
            $query = "SELECT * FROM products WHERE ";
    
            $conditions = array();
    
            if ($searchValue !== null) {
                $conditions[] = "name LIKE :searchValue";
            }
            if ($category_id !== null) {
                $conditions[] = "category_id = :category_id";
            }
            if ($gender !== null) {
                $conditions[] = "gender = :gender";
            }
            if ($min !== null && $max !== null) {
                $conditions[] = "price BETWEEN :min AND :max";
            }
    
            $query .= implode(" AND ", $conditions);
    
            if (empty(trim($query))) {
                throw new InvalidArgumentException("Invalid information");
            }
    
            $statement = $this->connection->prepare($query);
    
            if ($searchValue !== null) {
                $statement->bindValue(':searchValue', "%$searchValue%", PDO::PARAM_STR);
            }
            if ($gender !== null) {
                $statement->bindParam(':gender', $gender, PDO::PARAM_INT);
            }
            if ($category_id !== null) {
                $statement->bindParam(':category_id', $category_id, PDO::PARAM_INT);
            }
            if ($min !== null && $max !== null) {
                $statement->bindParam(':min', $min, PDO::PARAM_INT);
                $statement->bindParam(':max', $max, PDO::PARAM_INT);
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

