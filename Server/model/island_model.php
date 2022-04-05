<?php 
/*
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
*/
class Island_model {
    private $db;
    private $island;

    function __construct() {
        require_once("./settings/connection.php");
        $this->db=Connection::connect();
        $this->island=new stdClass();
        $this->correct = false;

    }
    public function retrieveIslands() {
        $sql = $this->db->prepare('SELECT * FROM islands');
        $sql->execute();
        $results = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $results;  
    }
    public function addIsland($body) {
        $name = $body->name;
        $description = $body->description;
        $area = $body->surface;
        $cords = $body->cords[0];
        $country = $body->country;
        $population = $body->population;
        $images = $body->images;
        $flag = $body->flag;
        $price = $body->price;
        $owner = $body->owner;
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        $sql = $this->db->prepare('INSERT INTO islands VALUES(null,:name,:description,:area,:latitude,:longitude,:country,:population,:images,:flag,:price,:owner,now(),0)');
        $sql->bindParam(':name', $name);
        $sql->bindParam(':description', $description);
        $sql->bindParam(':area', $area);
        $sql->bindParam(':latitude', $cords);
        $sql->bindParam(':longitude', $cords);
        $sql->bindParam(':country', $country);
        $sql->bindParam(':population', $population);
        $sql->bindParam(':images', $images[0]);
        $sql->bindParam(':flag', $flag);
        $sql->bindParam(':price', $price);
        $sql->bindParam(':owner', $owner);
        
        if (!$sql->execute()) {
            print_r($sql->errorInfo());
        }
        echo "HIA";
        /*$this->userRegistration->message = "error!";*/
        return $body; 
    }
}

?>