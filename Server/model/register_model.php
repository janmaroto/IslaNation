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
        $email = $body->email;
        $pass = password_hash($body->pass, PASSWORD_DEFAULT);
        $avatar = 'default.jpg';
        $sql = $this->db->prepare('INSERT INTO users VALUES (null,:user,:pass,:email,:avatar)');
        $sql->bindParam(':user', $user);
        $sql->bindParam(':email', $email);
        $sql->bindParam(':pass', $pass);
        $sql->bindParam(':avatar', $avatar);
        if ($sql->execute()) {
            $this->userRegistration->id = $this->db->lastInsertId();
            $this->userRegistration->username = $user;
            $this->userRegistration->email = $email;
            $this->userRegistration->avatar = $avatar;
            $this->userRegistration->message = "success";

            return $this->userRegistration;

        }
        $this->userRegistration->message = "error!";
        return $this->userRegistration;
    } 
    
}

?>