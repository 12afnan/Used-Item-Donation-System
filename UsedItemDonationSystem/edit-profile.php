<?php
    include('connect.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - Daizu Foundation</title>
    <style><?php include ('style_index.css') ?></style>
    <script>
            var loadImage = function(event) 
            {
                var output = document.getElementById('imgOut');
                output.src = URL.createObjectURL(event.target.files[0]);
                output.onload = function() 
                {
                    URL.revokeObjectURL(output.src) // free memory
                }
            };
        </script>

</head>
<body id="wrapper">

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
                { 
                    ?>
                    <a href="register.php" class="reg">Register</a>
                    <a href="log-in.php" class="log">Login</a>
                    <?php
                } 
                    ?>
                    <a href="dashboard.php"><img src="icon/user-icon.png" alt="user-icon"></a>
            </div>
    </div>
</header>
    <div class="box">
        <div class="flex">
            <div>
                <p class="boxtitle">Edit your profile</p>
        </div>
            <img class="soybox"  src="icon/soy.png" alt="Soy Logo">
        </div>
            
    <div class="mainform">
        <div class="font-size">
            <?php
            $id = $_SESSION['user_id'];
            $sql = "SELECT * FROM user WHERE user_id='".$id."'";

            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['username'] = $row['username'];

                    echo "<form action='update.php' method='post' enctype='multipart/form-data'>";
                    echo "<input name='user_image' type='file' accept='image/*' id='imgIn' onchange='loadImage(event)'>";
                    echo "<img id='imgOut' alt='Profile picture' style='width:50%; height:50%;'>";
            ?>
                    <p><label for="name">Name </label> <br>
                <?php
                    echo "<input type='text'  name='u_name' required value='".$row['name']."'></p>";
                ?> 
                    <p><label for="username">Username </label> <br>
                <?php
                    echo "<input type='text'  name='username' readonly value='".$row['username']."'></p>";
                ?> 
                    <p><label for="gender">Gender</label><br>
                <?php
                    if($row['gender'] == "female")
                    {
                        echo "<input type='radio' name='u_gender' value=female checked>Female
                        <input type='radio' name='u_gender' value=male >Male ";
                    }
                    else
                    {
                        echo "<input type='radio' name='u_gender' value=female>Female
                        <input type='radio' name='u_gender' value=male checked>Male ";
                    }
                ?>
                    <p><label for="phonenum">Phone No</label><br>
                <?php
                    echo "<input type='tel'  name='u_phone' required value='".$row['phonenum']."'></p>";
                ?>
                    <p><label for="email">Email </label> <br>
                <?php
                    echo "<input type='email'  name='u_email' required value='".$row['email']."'></p>";
                ?>
            </div>
                <?php
                    echo "<p><button name='insert' type='submit'>Update</button></p>";
                
                    echo "</form>";
                    ?>
                    <a href="deleteUser.php?id=<?php echo $row['user_id']; ?>"><button>Delete Account</button></a>
                    <?php
                 }   
            }
            else
            {
                echo "0 result";
            }
                ?>
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

</body>
</html>