<?php
    $host="localhost";
    $username="root";
    $password="";
    $namaDB="latihan_laravel_1";
    $mysqli=new mysqli($host,$username,$password,$namaDB);
    
    if ($mysqli->connect_errno){
        echo"Failed to connect to MySql: ".$mysqli->connect_error;
        exit();
    }
    else{  
        
    }
?>