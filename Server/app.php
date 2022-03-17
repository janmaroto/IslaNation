<?php
class App {
    public function __construct($params, $body, $method, $x_api_key) {
        $controller_name = strtolower(array_shift($params));
        array_unshift($params, $method);
        array_unshift($params, $x_api_key);
        $file = "./controller/" . $controller_name . ".php";
        if (file_exists($file)) {
            require_once $file;
            $controller = new ucfirst($controller_name($params, $body));
        } {
            require_once './controller/error_c.php';
            $controller = new Error_c($params);
        }
    }
}


?>