<?php
    $servername = "localhost:3308";
    $username = "root";
    $password = "";
    $database = "shoe_head";

    $conn = mysqli_connect($servername, $username, $password,$database);
    if (!$conn) 
    {
        echo "Connection Failed";
        exit;
    }
?>