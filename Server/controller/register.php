<?php
require_once("./model/register_model.php");
class Register {

    function __construct($params, $body) {
        $x_api_key = array_shift($params);
        $method = array_shift($params);
        switch ($method) {
            case "POST":
                $this->userRegistration($body);
                break;
            case "OPTIONS":
                http_response_code(204);
                break;
            default:
                $this->notImplementedMethodPelicula($params, $body, $method);
                break;
        }
    }
    private function userRegistration($body){
        $model = new Register_model();
        $register = $model->registerUser($body);
        require_once("./view/register_view.php");
    }
    
}

?>