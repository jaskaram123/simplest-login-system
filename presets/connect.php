<?php
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'userid';

    $conn = mysqli_connect($server, $username, $password, $database);
    if (!$conn){
        die("Could not connect to the server." . mysqli_connect_error());
    
    }
?>