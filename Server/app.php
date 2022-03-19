<?php
class App {
    public function __construct($params, $body, $method, $x_api_key) {
    // public function __construct($params, $body) {
        $controller_name = strtolower(array_shift($params));
        // $controller_name = "login";
        array_unshift($params, $method);
        array_unshift($params, $x_api_key);
        $file = "./controller/" . $controller_name . ".php";
        if (file_exists($file)) {
            require_once $file;
            $controller = new $controller_name($params, $body);
        }else  {
            require_once './controller/error_c.php';
            $controller = new Error_c($params);
        }
    }
}


?>