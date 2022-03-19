<?php
    $test1 = json_decode($argv[1]); //the arguments passed
    $test2 = json_encode($test1);
    // echo($test1->name);
    $user = "john";
    $pass = "johnpass";
    $sql = "SELECT username, id FROM users WHERE (username = " . $user . " OR email = " . $user . ") AND pwd_hash = " . $pass . ";";
    echo($sql);

?>
