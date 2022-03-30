<?php
class Login_model {
    private $db;
    private $userLogin;

    function __construct() {
        require_once("./settings/connection.php");
        $this->db=Connection::connect();
        $this->userLogin=new stdClass();
    }
    public function checkUser($body){
        $user = $body->user;
        $pass = $body->pass;
        $sql = $this->db->prepare('SELECT username, id, pwd_hash FROM users WHERE (username = :user OR email = :user)');
        $sql->bindParam(':user', $user);
        $sql->bindParam(':pass', $pass);
        $sql->execute();

        while ($row=$sql->fetch()){
            $this->userLogin->username = $row['username'];
            $this->userLogin->id = $row['id'];
            $hashPass = $row['pwd_hash'];
            if (password_verify($pass,$hashPass)) {
                $this->userLogin->uuid = generateUuid();
                $this->userLogin->message = "success";
                $sql_i = "INSERT INTO uuids VALUES(:uuid, :user);";
                $data = [
                    'uuid'=> $this->userLogin->uuid,
                    'user'=>$this->userLogin->id
                ];
                $rs_i = $this->db->prepare($sql_i)->execute($data);
                
            } else {
                $this->userLogin->message = "Username or password are incorrect!";
            }
        }
        
        return $this->userLogin;
    } 
    
}
function generateUuid() {
    // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
    $data = $data ?? random_bytes(16);
    assert(strlen($data) == 16);

    // Set version to 0100
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    // Set bits 6-7 to 10
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    // Output the 36 character UUID.
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

?>