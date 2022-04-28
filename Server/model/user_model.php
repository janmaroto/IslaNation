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
        $sql = $this->db->prepare("SELECT nickname, id, avatar FROM users WHERE nickname = '$user'");
        // $sql->bindParam(':user', $user);
        $sql->execute();
        $row=$sql->fetch();
        $this->user->username = $row['nickname'];
        $this->user->id = $row['id'];
        $this->user->avatar = $row['avatar'];
        return $this->user;  
    }
    public function removeUser($params, $x_api_key) {
        $user = array_shift($params);

        $sql_s1 = $this->db->prepare("SELECT id FROM users WHERE nickname='$user'");

        $sql_s1->execute();


        if (!($row=$sql_s1->fetch())) {
            $this->user->message =  "not authorized";
            http_response_code(401);
            return $this->user; 
        }
        $user_id = $row['id'];

        $sql_s2 = $this->db->prepare("SELECT count(*) as n FROM uuids WHERE user = :id AND uuid = :x_api_key;");
        $sql_s2->bindParam(':id', $user_id);
        $sql_s2->bindParam(':x_api_key', $x_api_key);
        $sql_s2->execute();

        if ($sql_s2->fetch()['n'] < 1) {
            $this->user->message =  "not authorized";
            http_response_code(401);
            return $this->user;  
    
        }
        
        $sql_d1 = $this->db->prepare("DELETE FROM uuids WHERE user = '$user_id'");
        $sql_d2 = $this->db->prepare("DELETE FROM islands WHERE owner = '$user_id'");
        $sql_d3 = $this->db->prepare("DELETE FROM users WHERE id = '$user_id'");

        if (!($sql_d1->execute())) {
            $this->user->message =  "error deleting open sessions of: " . $user;
            http_response_code(401);
            return $this->user; 
        }
        if (!($sql_d2->execute())) {
            $this->user->message =  "error deleting islans of: " . $user;
            http_response_code(401);
            return $this->user; 
        }
        if (!($sql_d3->execute())) {
            $this->user->message =  "error deleting user details of: " . $user;
            http_response_code(401);
            return $this->user; 
        }
        $this->user->message =  "success";
        return $this->user;

    }
    
    
}

?>