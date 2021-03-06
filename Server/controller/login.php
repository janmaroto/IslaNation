<?php
    require_once("./model/login_model.php");
    class Login {
        function __construct($params, $body) {
            $x_api_key = array_shift($params);
            $method = array_shift($params);
            switch ($method) {
                case "POST":
                    $this->userLogin($body);
                    break;
                case "OPTIONS":
                    http_response_code(204);
                    break;
                default:
                    $this->notImplementedMethod($params, $body, $method);
                    break;
            }
        }
        private function userLogin($body){
            $model = new Login_model();
            $login = $model->checkUser($body);
            require_once("./view/login_view.php");
        }
    }
?>