<?php
    $hostname = "127.0.0.1";
    $username = "root";
    $password = "sayati";
    $database = "studdict";
    $port = "3316";

    $conn = mysqli_connect($hostname, $username, $password, $database, $port);
 
    if (!$conn) {
        die('Could not connect: ' . mysqli_error($conn));
    }
 
    // echo 'Connected successfully';
?>