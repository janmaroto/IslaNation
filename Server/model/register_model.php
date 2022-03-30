<?php
class Register_model {
    private $db;
    private $userRegistration;

    function __construct() {
        require_once("./settings/connection.php");
        $this->db=Connection::connect();
        $this->userRegistration=new stdClass();
    }
    public function registerUser($body){
        $user = $body->user;
        $id = crc32($user);
        $email = $body->email;
        $pass = password_hash($body->pass, PASSWORD_DEFAULT);
        $avatar = 'default.jpg';
        $sql = $this->db->prepare('INSERT INTO users VALUES (:id,:user,:pass,:email,:avatar)');
        $sql->bindParam(':id', $id);
        $sql->bindParam(':user', $user);
        $sql->bindParam(':email', $email);
        $sql->bindParam(':pass', $pass);
        $sql->bindParam(':avatar', $avatar);
        if ($sql->execute()) {
            $this->userRegistration->id = $id;
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