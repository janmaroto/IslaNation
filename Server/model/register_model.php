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
        $pass = password_hash($body->pass, PASSWORD_DEFAULT);
        $sql = $this->db->prepare('INSERT INTO users VALUES (null,:user,:pass,:mail, "null")');
        $sql->bindParam(':user', $user);
        $sql->bindParam(':mail', $mail);
        $sql->bindParam(':pass', $pass);
        if ($sql->execute()) {
            $this->userRegistration->id = $this->db->lastInsertId();echo $this->userRegistration->id;
            $sql_i = $this->db->prepare('SELECT * FROM users WHERE id=' . $this->userRegistration->id . ';');
            $sql_i->execute();
            while ($row=$sql_i->fetch()){
                $this->userRegistration->username = $row['username'];
                $this->userRegistration->mail = $row['email'];
                $this->userRegistration->pic = $row['avatar'];
            }
            print_r($this->userRegistration);
            $this->userRegistration->user = "assa";
        } else {
            $this->userRegistration->message = "Username or password are incorrect!";
        }
        return $this->userRegistration;
    } 
    
}

?>