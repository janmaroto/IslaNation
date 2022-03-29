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

        $sql_s = $this->db->prepare("SELECT count(*) as n FROM uuids WHERE user = :user AND uuid = :x_api_key;");
        $sql_s->bindParam(':user', $user);
        $sql_s->bindParam(':x_api_key', $x_api_key);
        $sql_s->execute();

        if ($sql_s->fetch()['n'] != 1) {
            $this->user->message =  "not authorized to delete user " . $user;
            return $this->user;  
    
        }
        
        $sql_d1 = $this->db->prepare("DELETE FROM uuids WHERE user = $user");
        $sql_d2 = $this->db->prepare("DELETE FROM users WHERE id = $user");
        if ($sql_d1->execute()) {
            if (!$sql_d2->execute()) {
                $this->user->message =  "error deleting user " . $user;
                return $this->user; 
            }
        }
        $this->user->message =  "success";
        return $this->user;

    }
    
    
}

?>