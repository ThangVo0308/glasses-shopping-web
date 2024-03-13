<?php
    require_once(__DIR__ . '/../DAL/database.php');
    class PointDAL {
        private $connection;

        private static $instance;

        public static function getInstance() {
            if (!isset(self::$instance)) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function __construct() {
            global $connection;
            $this->connection = $connection;
        }

        public function createPointFromRow($row)
    {
        $point = new points();
        $point->setId($row['id']);
        $point->setUserid($row['user_id']);
        $point->setPointsearned($row['points_earned']);
        $point->setPointsused($row['points_used']);

        return $point;
    }

        public function getAllPoint() {
            try {
                $query = "select * from points";
                $statement = $this->connection->query($query);
                $statement->execute();
                $listPoint = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $listPoint;
            }catch(PDOException $e) {
                echo "Query failed: ".$e->getMessage();
                return false;
            }
        }

        public function addPoint(points $point) {
            try{
                $query = "insert into points (user_id,points_earned,points_used) 
                         values (:user_id,:points_earned,:points_used)";
                $statement = $this->connection->prepare($query);
                $statement->bindParam(':user_id',$point->getUserid());
                $statement->bindParam(':points_earned',$point->getPointsearned());
                $statement->bindParam(':points_used',$point->getPointsused());;
                $statement->execute();
                return true;
            }catch(PDOException $e) {
                echo "Add failed: ".$e->getMessage();
                return false;
            }
        }

        public function updatePoint(points $point) {
            try {
                $query = "update points set user_id=?, points_earned=?, points_used=? where id=?";
                $statement = $this->connection->prepare($query);

                $user_id = $point->getUserid();

                $points_earned = $point->getPointsearned();     
                $points_used =$point->getPointsused();
                $id = $point->getID();

                $statement->bindParam(1,$user_id);
                $statement->bindParam(2,$points_earned);
                $statement->bindParam(3,$points_used);
                $statement->bindParam(4,$id);

                $statement->execute();
                return true;
            }catch(PDOException $e) {
                echo "Update failed: ".$e->getMessage();
                return false;
            }
        }

        public function deletePoint($id) {
            try {
                $query = "delete from points where id = ?";
                $statement = $this->connection->prepare($query);
                $statement->bindValue(1, $id, PDO::PARAM_INT);
                $statement->execute();

                return true;
            }catch(PDOException $e) {
                echo "Delete failed: ".$e->getMessage();
                return false;
            }
        }

        public function searchPoint($condition,$columnName) {
           try {
            $pointList = array();

            if($condition == null || strlen($columnName) == 0) {
                $query = "select * from points where concat(id, user_id, points_earned, points_used) like ?";
            }else if(strlen($columnName) == 1) {
                $column = $columnName[0]; // selected column
                $query = "select * from points where ".$column.+" like ?";
            }else {
                $columns = implode(",",$columnName);
                $query = "select id, user_id, points_earned, points_used from points where concat(".$columns.") like ?";
            }

            $statement = $this->connection->prepare($query);
            if($condition != null) {
                $searchCondition = "%".$condition."%";
                $statement->bindColumn(1,$searchCondition);
            }

            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $product) {
                $product1 = $this->createPointFromRow($product);
                $pointList[] = $product1;
            }
            return $pointList;
           }catch(PDOException $e) {
                echo "Search failed".$e->getMessage();
                return array();
           }
        }

    }    


?>