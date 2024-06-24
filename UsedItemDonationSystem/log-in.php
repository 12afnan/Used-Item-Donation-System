<?php
   include("connect.php");
?>
<style><?php include ('style_forms.css') ?></style>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Log In - Daizu Foundation </title>
        <link rel="stylesheet" type="text/css" href="style_forms.css">

        <script>
            function showPassword() 
            {
                var x = document.getElementById("inputPassword");
                if (x.type === "password") 
                {
                    x.type = "text";
                } 
                else 
                {
                    x.type = "password";
                }
            }
        </script>

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
                    <img src="icon/user-icon.png" alt="user-icon">
                </div>
            </div>
            </header>

            <div class="box">
            <div class="flex">
                <div>
                    <p class="boxtitle">Welcome to Daizu Foundation</p>
                    <p class="optiontitle"><a href="register.php"> Create an account</a> or log in</p>
                </div>
                <img class="soybox"  src="icon/soy.png" alt="Soy Logo">
            </div>
            
            <div class="mainform">
                <div class="font-size">
                    <form action="index2.php" method="post">
                    
                        <p><label for="username">Username </label> <br>
                            <input type="text" id="username" name="username" required></p>

                        <p><label for="password">Password </label> <br>
                            <input type="password" id="inputPassword" name="password" required></p>
     
                </div>
                <p><label><input type="checkbox" value="Show Password" onclick="showPassword()">Show Password</label></p>
                        <p><button type="submit" id="button" value="Log In">Log In</p>
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
