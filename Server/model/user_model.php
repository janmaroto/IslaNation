<?php
class User_model {
    private $user;

    function __construct() {
        require_once("./settings/connection.php");
        $this->db=Connection::connect();
        $this->user=new stdClass();
        $this->correct = false;

    }
    public function retrieveUser($params) {
        $user = array_shift($params);
        $sql = $this->db->prepare('SELECT username, id, avatar FROM users WHERE username = :user');
        $sql->bindParam(':user', $user);
        $sql->execute();
        $row=$sql->fetch();
        $this->user->username = $row['username'];
        $this->user->id = $row['id'];
        $this->user->avatar = $row['avatar'];
        return $this->user;  
    }
    public function removeUser($params, $x_api_key) {
        $user = array_shift($params);
        $sql = $this->db->prepare('DELETE FROM users WHERE id = :id');
        $sql->bindParam(':id', $user);
        $sql->execute();
        $this->user->id = $row['id'];
        return $this->user;  
    }
    
    
}

?>