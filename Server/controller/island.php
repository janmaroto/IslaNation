<?php
require_once("./model/island_model.php");
class Island {

    function __construct($params, $body) {
        $x_api_key = array_shift($params);
        $method = array_shift($params);
        switch ($method) {
            case "GET":
                $this->getIslands();
                break;
            case "POST":
                $this->addIsland($body);
                break;
            case "PUT":
                $this->putUser($params, $x_api_key, $body);
                break;
            case "DELETE":
                $this->deleteUser($params, $x_api_key);
                break;
            default:
                $this->notImplementedMethod($params, $body, $method);
                break;
        }
    }
    
    private function getIslands(){
        $model = new Island_model();
        $islands = $model->retrieveIslands();
        require_once("./view/island_view.php");
    }
    private function addIsland($body){
        $model = new Island_model();
        $islands = $model->addIsland($body);
        require_once("./view/island_view.php");
    }
}

?>