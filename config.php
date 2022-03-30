<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "my_new_login";

    //make connecting
    $con = mysqli_connect($server,$user,$pass,$db);
    //connection Velidation
    if(!$con){
        die("Connection ERROR...!".mysqli_connect_error());
    }
?>