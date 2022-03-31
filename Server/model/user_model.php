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
        $sql = $this->db->prepare('SELECT nickname, id, avatar FROM users WHERE nickname = :user');
        $sql->bindParam(':user', $user);
        $sql->execute();
        $row=$sql->fetch();
        $this->user->username = $row['nickname'];
        $this->user->id = $row['id'];
        $this->user->avatar = $row['avatar'];
        return $this->user;  
    }
    public function removeUser($params, $x_api_key) {
        $user = array_shift($params);

        $sql_s1 = $this->db->prepare("SELECT id FROM users WHERE user = $user");
        $sql_s1->execute();
        if ($row = $sql_s1->fetch()) {
            $this->user->message =  "user does not exist " . $user;
            return $this->user; 
        }
        $id = $row['id'];

        $sql_s2 = $this->db->prepare("SELECT count(*) as n FROM uuids WHERE user = :id AND uuid = :x_api_key;");
        $sql_s2->bindParam(':id', $id);
        $sql_s2->bindParam(':x_api_key', $x_api_key);
        $sql_s2->execute();

        if ($sql_s2->fetch()['n'] != 1) {
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