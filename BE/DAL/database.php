<?php
        define('DATABASE_SERVER','localhost');
        define('DATABASE_USER','root');
        define('DATABASE_PASSWORD','');
        define('DATABASE_NAME','glassesshopping');
    
        try{
            $connection = new PDO("mysql:host=".DATABASE_SERVER.";dbname=".DATABASE_NAME,DATABASE_USER,DATABASE_PASSWORD);
            $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            echo "Connect sucessfully";
        }catch(PDOException $e) {
            echo "Connection failed: ".$e->getMessage();
            $connection = null;
        }
?>