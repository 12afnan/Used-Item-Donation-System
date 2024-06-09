<?php
    include("connect.php");

    $name = $_POST['name'];
    $username = $_POST['username'];
    $gender = $_POST['gender'];
    $phonenum = $_POST['phonenum'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    // $hash = password_hash($pass, PASSWORD_DEFAULT);

    $sql = "INSERT INTO `user` (name, username, gender, phonenum, email, password) VALUES ('$name', '$username', '$gender','$phonenum', '$email', '$password')" or die ("Error inserting data into table");
    
    if($conn->query($sql) === TRUE)
    {
        echo "New record created successfuly";
        echo "<meta http-equiv=\"refresh\" content=\"3;url=index.php\">";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . $conn->error;    
    }
?>









