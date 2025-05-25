<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $databse = "discuss";

    $conn = mysqli_connect($host, $user, $password, $databse);
    if (mysqli_connect_errno()) {
        echo  mysqli_connect_error();
    }else{
        // echo("connected to  Database Successfully");
    }

?>