<?php
class Login {

    function __construct($params, $body) {
        $this->userLogin($body);
    }
    private function userLogin($body){
        $model = new Login_model();
        $login = $model->checkUser($body);
    }

    
    
}

?>