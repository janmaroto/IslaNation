<?php
    require_once("./model/logout_model.php");
    class Logout {
        function __construct($params, $body) {
            $model = new Logout_model();
            $x_api_key = array_shift($params);
            $method = array_shift($params);
            switch ($method) {
                case "DELETE":
                    $logout = $model->logOut($body);
                    require_once("./view/logout_view.php");
                    break;
                case "OPTIONS":
                    http_response_code(204);
                    break;
                default:
                    //$this->notImplementedMethod($params, $body, $method);
                    http_response_code(207);
                    break;
            }
        }
    }
?>