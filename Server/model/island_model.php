<?php
class Island_model {
    private $island_id;
    private $island_name;
    private $island_desc;
    private $island_area;
    private $island_location; // Longitud, latitude and country.
    private $user_email;
    private $island_pop;
    private $island_pics;  // All tree product pics and its flag.
    private $island_price;
    private $island_add_date;
    private $island_owner;
    private $island_visits;

    function __construct($params) {

    }
    
    
}

?>
<?php
class Island_model {
    private $db;
    private $island;

    function __construct() {
        require_once("./settings/connection.php");
        $this->db=Connection::connect();
        $this->user=new stdClass();
        $this->correct = false;

    }
    public function retrieveIsland($params) {
        $id = array_shift($params);
        $sql = $this->db->prepare('SELECT * FROM islands WHERE id = :id');
        $sql->bindParam(':user', $user);
        $sql->execute();
        $row=$sql->fetch();
        $this->user->username = $row['nickname'];
        $this->user->id = $row['id'];
        $this->user->avatar = $row['avatar'];
        return $this->user;  
    }
}

?>