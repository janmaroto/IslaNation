<?php
    class Connection {
        public static function connect(){
            try {
                $db = new PDO("mysql:host=localhost;dbname=islanation", "admin", "admin");
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $db->exec("SET CHARACTER SET UTF8");
            }
            catch(Exception $e){
                die("Connection error:" . $e->getMessage());
            }
            return $db;
        }
    }
?>