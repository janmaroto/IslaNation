<?php
require_once("./model/island_model.php");
class User {

    function __construct($params, $body) {
        $x_api_key = array_shift($params);
        $method = array_shift($params);
        switch ($method) {
            case "GET":
                $this->getUser($params);
                break;
            case "PUT":
                $this->putUser($params, $x_api_key, $body);
                break;
            case "DELETE":
                $this->deleteUser($params, $x_api_key);
                break;
            default:
                $this->notImplementedMethodPelicula($params, $body, $method);
                break;
        }
    }
    
    private function getUser($params){
        $model = new User_model();
        $user = $model->retrieveUser($params);
        require_once("./view/user_view.php");
    }
    private function putUser($params, $x_api_key, $body){
        $model = new User_model();
        $user = $model->editUser($params);
        require_once("./view/user_view.php");
    }
    private function deleteUser($params, $x_api_key){
        $model = new User_model();
        $user = $model->removeUser($params, $x_api_key);
        require_once("./view/user_view.php");
    }
    
}

?>