<?php
require_once("./model/register_model.php");
class Register {

    function __construct($params, $body) {
        $this->userRegistration($body);
    }
    private function userRegistration($body){
        $model = new Register_model();
        $register = $model->registerUser($body);
        require_once("./model/register_view.php");
    }
    
}

?>