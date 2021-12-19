<?php

    $server = "172.20.0.2";
    $user = "root";
    $password = "admin";
    $db_name = "arsipdb";

    $db = mysqli_connect($server, $user, $password, $db_name);

    if( !$db ){
        die("Gagal terhubung dengan database: " . mysqli_connect_error());
    }
    
?>