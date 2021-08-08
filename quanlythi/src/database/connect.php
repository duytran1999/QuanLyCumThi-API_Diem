<<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db_name = 'tintuc';
    $conn = new MySQLi($host,$user,$pass,$db_name);
    $conn->set_charset("utf8");
    if($conn->connect_error){
        die('Database connect error: '. $conn->connect_error);
    }
?>