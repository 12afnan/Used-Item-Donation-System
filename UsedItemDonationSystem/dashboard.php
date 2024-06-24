<?php
    include("connect.php");
    session_start();
    
    if (!isset($_SESSION['user_id']) || !isset($_SESSION['username'])) 
    {
        echo "<script>alert('Please log in first');</script>";
        echo "<meta http-equiv=\"refresh\" content=\"0;url=log-in.php\">"; // Redirect to log-in.php
        exit();
    }
?>
<style><?php include ('style_index.css') ?></style>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style_index.css">
    <title>My Dashboard - Daizu Foundation</title>
    <style>
        *{  
            margin:0; padding:0;
            box-sizing: border-box;
            outline: none;  
            border:none;
            text-decoration: none;
            transition: .2s linear;
        }
    </style>
</head>

<body>
    <div id="wrapper">
    <header>
        <div class="header">
                <a href="index.php" class="logo flex">
                    <img src="icon/soy.png" class="soylogo" alt="Daizu Foundation">
                    <div>Daizu<br/>Foundation</div>
                </a>
                <article>Used Item Donation System</article>

                <div class="header-right">
                    <a href="add-item.php"><button style="margin-right: 10px;">Donate !</button></a>
                    <!-- Check if the user is logged in by verifying the session variable -->
                        <?php 
                    if (isset($_SESSION['username']))
                    {
                        echo $_SESSION['username']; 
                        ?>
                        <?php
                    }
                    else if ((isset($_SESSION['username'])) == FALSE)
                    { ?>
                        <a href="register.php" class="reg">Register</a>
                        <a href="log-in.php" class="log">Login</a>
                        <?php
                    } 
                    ?>
                    <a href="dashboard.php"><img src="icon/user-icon.png" alt="user-icon"></a>
                </div>
        </div>
    </header>

    <div class="container">
        <div class="square">
            <h1 class="heading">My Dashboard</h1>
        <div> 
        <div class="profile">
            <?php
            $username = $_SESSION['username'];
                
            $sql = "SELECT * FROM `user` where `username` = '$username'";

            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    echo '<img src="data:image/jpeg;base64,'.base64_encode($row['user_image']).'" alt="User Image">';
                }
            }
            ?>
            <!-- <img id="myImage" src="icon/user-icon.png"> -->
            <div  class="content">
                <?php 

                    $username = $_SESSION['username'];
                
                    $sql = "SELECT * FROM `user` where `username` = '$username'";
                
                    $result = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result) > 0)
                    {
                        while($row = mysqli_fetch_assoc($result))
                        {
                            echo "<table>";
                            echo "<tr><th>Username: </th><td>".$row['username']."</td></tr>";
                            echo "<tr><th>Name: </th><td>".$row['name']."</td></tr>";
                            echo "<tr><th>Gender: </th><td>".$row['gender']."</td></tr>";
                            echo "<tr><th>Phone: </th><td>".$row['phonenum']."</td></tr>";
                            echo "<tr><th>Email: </th><td>".$row['email']."</td></tr>";
                            
                            echo "</tr>";
                        }
                        echo "</table>";
                    }
                    else
                    {
                        echo "0 results";
                    }
                ?>

                <a href ="edit-profile.php"><button class="edit">Edit Profile</button></a>
                <a href="log-out.php"><button class="logout">Log Out</button></a> 

            </div>
        </div>
        </div>
            
        <div class="box-container">
            <div class="bttn">
            <div class="box">
                <img id="myImage" src="icon/dashboard/loves.png" style="width: 80px;">
                <h3>My Likes</h3>
            </div>
        </div>
    
            <div class="bttn">
            <div class="box">
                <img id="myImage" src="icon/dashboard/donate.png" style="width: 80px;">
                <h3>Donated Item</h3>
            </div>
        </div>
    
            <div class="bttn">
            <div class="box">
                <img id="myImage" src="icon/dashboard/save.png" style="width: 80px;">
                <h3>My Save</h3>
            </div>
        </div>
    
            <div class="bttn">
            <div class="box">
                <img id="myImage" src="icon/dashboard/booking.png" style="width: 80px;">
                <h3>Retrieved Item</h3>
            </div>
        </div>
    
        </div>
    
        <div>
            <p class="tengah"> Have a question ? Dont hesitate to <a href ="contact.html" class="click"> contact us </a> </p>
        </div>
        
        </div>
    </div>
    
    <footer>
        <div class="footer">
            <div class="footer-left">
                <a href="contact.html">Contact</a>
                <a href="about-us.html">About Us</a>
            </div>
            <div class="footer-right">
                <p>© 2024 Daizu Foundation.</p>
            </div>
        </div>
    </footer>

    </div>

</body>
</html>