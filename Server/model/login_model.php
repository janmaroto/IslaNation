<?php
class Login_model {
    private $registeredUser;

    function __construct() {
        require_once("../settings/connection.php");
        $this->db=Connection::connect();
        $this->registeredUser=array();

    }
    private function checkUser($params){
        $user = "john";
        $pass = "jhonpass";
        $sql = "SELECT username, userid FROM users WHERE (username = " . $user . " OR useremail = " . $user . ") AND password = " . $pass;
        $rs = $this->db->query($sql);
        while ($row=$rs->fetch(PDO::FETCH_ASSOC)){
            array_unshift($this->registeredUser->username, $row[0]);
            array_unshift($this->registeredUser->userid, $row[1]);
        }
        if (count($this->registeredUser) == 1) {
            $this->uuid = generateUuid();
            $sql_i = "INSERT INTO uuids VALUES(:uuid, :user);";
            $data = [
                'uuid'=> $this->registeredUser->uuid,
                'user'=>$registeredUser->userid
            ];
            $rs_i = $this->db->prepare($sql_i)->execute($data);
        }
        return $this->registeredUser;
    }

    static function generateUuid($data = null) {
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

    
    
}

?>