<?php

   function getAllItems()
    {
        $conn = mysqli_connect("localhost", "root", "", "projectdb");
        $query = "SELECT * FROM `items` ORDER BY RAND()"; 
        
        $res = mysqli_query($conn, $query);
        while($row = $res->fetch_assoc())
        {
            $items[] = $row;
        }
        return $items;
   }

   function getItemsByCategory($category)
   {
        $conn = mysqli_connect("localhost", "root", "", "projectdb");
        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }
    
        $query = "SELECT * FROM `items` WHERE `category` = '$category'";

        $res = mysqli_query($conn, $query);
        while($row = $res->fetch_assoc())
        {
            $items[] = $row;
        }
        return $items;
   }

?>