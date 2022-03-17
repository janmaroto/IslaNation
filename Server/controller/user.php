<?php
class User {
    private $user_id;
    private $user_name;
    private $user_pwd_hash;
    private $user_email;
    private $user_avatar;

    function __construct($params, $body) {
        $method = array_shift($params);
        switch ($method){
            case "GET":
                $this->getUser($params);
                break;
            case "PUT":
                $this->updateUser($params, $body);
                break;
            case "DELETE":
                $this->deleteUser($params);
                break;
            default:
                $this->notImplementedMethodUser($params, $body, $method);
                break;
        }
    }
    private function getUser($params){
        $model = new User_model();
        if (count($params) == 0){
            $peliculas = $model->getPelis();
        $user = $model->getUserData($params[0]);
        $user = $model->getAllUserData($params[0]);
        require_once("./vista/user_vista.php");
    }
    
    
}

?>