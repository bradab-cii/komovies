<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $name_db = "movie";

    $conn = mysqli_connect($host,$user,$pass,$name_db);
    if(!$conn){
        echo("Database Connect Error..");
        die();
    }
    mysqli_query($conn,"set char set utf8");
    
?>