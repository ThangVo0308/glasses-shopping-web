<?php
    require('./database.php');
    class PointDAL {
        private $connection;

        public function __construct() {
            global $connection;
            $this->connection = $connection;
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
                $query = "insert into points (user_id,transaction_date,points_earned,points_used) 
                         values (:user_id,:transaction_date,:points_earned,:points_used)";
                $statement = $this->connection->prepare($query);
                $statement->bindParam(':user_id',$point->getUserid());
                $statement->bindParam(':transaction_date',$point->getTransactiondate());
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
                $query = "update points set user_id=?, transaction_date = ?, points_earned=?, points_used=? where id=?";
                $statement = $this->connection->prepare($query);

                $user_id = $point->getUserid();
                $transaction_date = $point->getTransactiondate();
                $points_earned = $point->getPointsearned();     
                $points_used =$point->getPointsused();
                $id = $point->getID();

                $statement->bindParam(1,$user_id);
                $statement->bindParam(2,$transaction_date);
                $statement->bindParam(3,$points_earned);
                $statement->bindParam(4,$points_used);
                $statement->bindParam(5,$id);

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
                $query = "select * from points where concat(id, user_id, transaction_date, points_earned, points_used) like ?";
            }else if(strlen($columnName) == 1) {
                $column = $columnName[0]; // selected column
                $query = "select * from points where ".$column.+" like ?";
            }else {
                $columns = implode(",",$columnName);
                $query = "select id, user_id, transaction_date, points_earned, points_used from points where ".$columns." like ?";
            }

            $statement = $this->connection->prepare($query);
            if($condition != null) {
                $searchCondition = "%".$condition."%";
                $statement->bindColumn(1,$searchCondition);
            }

            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $product) {
                $pointList[] = $product;
            }
            return $pointList;
           }catch(PDOException $e) {
                echo "Search failed".$e->getMessage();
                return array();
           }
        }

    }    


?>



