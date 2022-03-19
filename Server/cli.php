<?php
    require_once("app.php");
    $user_arg = json_decode($argv[1]);
    // $app = new App($user_arg->params, $user_arg->body, $user_arg->method, $user_arg->x_api_key);
    $app = new App($argv[1], $argv[2]);
?>