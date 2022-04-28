<?php
require_once("./model/island_model.php");
class Island {

    function __construct($params, $body) {
        $x_api_key = array_shift($params);
        $method = array_shift($params);
        switch ($method) {
            case "GET":
                $this->getIslands($params);
                break;
            case "POST":
                $this->postIsland($x_api_key, $body);
                break;
            case "PUT":
                $this->putIsland($params, $x_api_key, $body);
                break;
            case "DELETE":
                $this->deleteIsland($params, $x_api_key);
                break;
            default:
                $this->notImplementedMethod($params, $body, $method);
                break;
        }
    }
    
    private function getIslands($params){
        $model = new Island_model();
        $islands = $model->retrieveIslands($params);
        require_once("./view/island_view.php");
    }
    private function postIsland($x_api_key, $body){
        $model = new Island_model();
        $islands = $model->addIsland($x_api_key, $body);
        require_once("./view/island_view.php");
    }
}

?>