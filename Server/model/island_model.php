<?php 
class Island_model {
    private $db;
    private $island;

    function __construct() {
        require_once("./settings/connection.php");
        $this->db=Connection::connect();
        $this->island=new stdClass();
        $this->correct = false;

    }
    public function retrieveIslands($params) {
        if (count($params) == 0) {
            $error = new stdClass;
            $error->message = "Parameter not implemented yet.";
            return $error;
        } elseif ($params[0] == "all") {
            $sql = $this->db->prepare('SELECT * FROM islands');
        } else {
            $key = array_shift($params);
            $value = array_shift($params);
            $value = $value . "%";
            $sql_string = "SELECT * FROM islands WHERE " . $key . " LIKE " . "'" . $value . "'";
            $sql = $this->db->prepare($sql_string);
        }
        $sql->execute();
        $islands = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $islands;  
    }
    public function addIsland($x_api_key, $body) {
        $name = $body->name;
        $description = $body->description;
        $area = $body->surface;
        $cords = $body->cords;
        $country = $body->country;
        $population = $body->population;
        $images = $body->images;
        $flag = $body->flag;
        $price = $body->price;
        $owner = $body->owner;
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        $sql = $this->db->prepare('INSERT INTO islands VALUES(null,:name,:description,:surface,:latitude,:longitude,:country,:population,:images,:flag,:price,:owner,now(),0)');
        $sql->bindParam(':name', $name);
        $sql->bindParam(':description', $description);
        $sql->bindParam(':surface', $surface);
        $sql->bindParam(':longitude', $cords[0]);
        $sql->bindParam(':latitude', $cords[1]);
        $sql->bindParam(':country', $country);
        $sql->bindParam(':population', $population);
        $sql->bindParam(':images', $images[0]);
        $sql->bindParam(':flag', $flag);
        $sql->bindParam(':price', $price);
        $sql->bindParam(':owner', $owner);
        
        if (!$sql->execute()) {
            print_r($sql->errorInfo());
        }
        /*$this->userRegistration->message = "error!";*/
        return $body; 
    }
}

?>