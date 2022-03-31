<?php
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: *');
    header('Access-Control-Allow-Headers: *');
    header('Access-Control-Max-Age: 1728000');
    
    include_once('app.php');
    $url = $_GET['url'];
    $url = rtrim($url, '/');
    $params = explode('/',$url);
    $body = json_decode(file_get_contents('php://input'));
    // $x_api_key = ($_SERVER['HTTP_X_API_KEY'] ? $_SERVER['HTTP_X_API_KEY'] : "");
    $x_api_key = "";
    $app = new App($params, $body, $_SERVER['REQUEST_METHOD'], $x_api_key);
?>