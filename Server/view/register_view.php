<?php    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
    header('Access-Control-Allow-Headers: token, Content-Type');
    header("Content-Type: application/json; charset=utf-8");
    echo json_encode($register).PHP_EOL;
?>