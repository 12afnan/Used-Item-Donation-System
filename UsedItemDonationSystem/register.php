<?php
    include("connect.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register Here ! - Daizu Foundation</title>
        <link rel="stylesheet" type="text/css" href="style_forms.css">

        <script>
            function showPassword() 
            {
                var x = document.getElementById("inputPassword");
                var y = document.getElementById("confirmPassword");
                if (x.type === "password" || y.type === "password") 
                {
                    x.type = "text";
                    y.type = "text";
                } 
                else 
                {
                    x.type = "password";
                    y.type = "password";
                }
            }
        </script>
    </head>

    <body>
        <div id="wrapper">
            <header>
            <div class="header">
                    <a href="index.html" class="logo flex">
                        <img src="icon/soy.png" class="soylogo" alt="Daizu Foundation">
                        <div>Daizu<br/>Foundation</div>
                    </a>
                
                <div class="header-right">
                    <a href="register.php" class="reg">Register</a>
                    <a href="log-in.html" class="log">Login</a>
                    <img src="icon/user-icon.png" alt="user-icon">
                </div>
            </div>
            </header>

            <div class="box">
                <div class="flex">
                    <div>
                        <p class="boxtitle">First time here ?</p>
                        <p class="optiontitle">Create an account or <a href="log-in.html"> log in</a></p>
                    </div>
                    <img class="soybox"  src="icon/soy.png" alt="Soy Logo">
                </div>
            
                <div class="mainform">
                    <div class="font-size">

                        <form action="user.php" method="post">
                            <p><label for="name">Name </label> <br>
                                <input type="text" id="name" name="name" required></p>
                    
                            <p><label for="username">Username </label> <br>
                                <input type="text" id="username" name="username" required></p>

                            <p><label for="gender">Gender</label><br>
                                Male <input type="radio" checked="checked" name="gender" value="Male">
                                Female <input type="radio" name="gender" value="Female"> </p>

                            <p><label for="phonenum">Phone No</label><br>
                                <input type="tel"  id="phonenum" name="phonenum" required></p>

                            <p><label for="email">Email </label> <br>
                                <input type="email" id="email" name="email" required></p>

                                
                            <p><label for="password">Password </label> <br>
                                <input type="password" id="inputPassword" name="password" required></p>

                            <p><label for="confirm-password">Confirm Password </label> <br>
                                <input type="password" id="confirmPassword" required></p>
                    </div>
                            <p><label><input type="checkbox" value="Show Password" onclick="showPassword()">Show Password</label></p>
                            <p><button name="insert" type="submit">Register</button></p>
                        </form>
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
