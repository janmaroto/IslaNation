<?php
class Register_model {
    private $db;
    private $userRegistration;
    private $correct;

    function __construct() {
        require_once("./settings/connection.php");
        $this->db=Connection::connect();
        $this->userLogin=new stdClass();
        $this->correct = false;
    }
    public function registerUser($body){
        $user = $body->user;
        $mail = $body->mail;
        $pass = $body->pass;
        $sql = $this->db->prepare('INSERT INTO users VALUES (null,:user,:mail,:pass, "null")');
        $sql->bindParam(':user', $user);
        $sql->bindParam(':mail', $mail);
        $sql->bindParam(':pass', $pass);
        if ($sql->execute()) {
            $this->userRegistration->id = $db->lastInsertId();
            
            $sql_i = "SELECT * FROM users WHERE id=".$this->userRegistration->id.";";
            $rs_i = $this->db->prepare($sql_i)->execute();
            $this->userRegistration->user = "assa";
        } else {echo $mail;
            $this->userRegistration->message = "Username or password are incorrect!";
        }
        return $this->userRegistration;
    } 
    
}

?>