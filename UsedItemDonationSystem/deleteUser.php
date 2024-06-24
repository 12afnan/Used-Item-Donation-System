<?php
    session_start();

    include('connect.php');

    $id = $_SESSION['user_id'];
    $uname = $_SESSION['username'];

    $sql = "DELETE from `user` where user_id='".$id."'";
    $result = $conn->query($sql);

    if($conn->query($sql) === TRUE)
    {
        echo '<script>alert("Account '.$uname.' deleted successfully")</script>';
        session_destroy();
        echo "<meta http-equiv=\"refresh\" content=\"0;url=dashboard.php\">";
    }
    else
    {
        echo "<p>";
        echo "<p style='text-align:center'>Error: " . $sql ."<br>". $conn->error;
        echo "<p>";
    }
?>