<?php
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "used_item_donation_system";

    //create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    //check connection  
    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }
?>