<?php
    class Logout_model {
        private $db;
        private $lt;

        function __construct() {
            require_once("./settings/connection.php");
            $this->db=Connection::connect();
            $this->lt=new stdClass();
        }
        public function logOut($body) {
            
        $id = $body->id;
            
        $sql = $this->db->prepare('DELETE FROM uuids WHERE user = :user');
        $sql->bindParam(':user', $id);
        
        $sql->execute();
        return $id;
        } 
    }
?>