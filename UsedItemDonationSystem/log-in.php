<?php
   include("connect.php");
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Daizu Foundation - Log In </title>
        <link rel="stylesheet" type="text/css" href="style_forms.css">
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
                    <a href="register.html" class="reg">Register</a>
                    <a href="log-in.html" class="log">Login</a>
                    <img src="icon/user-icon.png" alt="user-icon">
                </div>
            </div>
            </header>

            <div class="box">
            <div class="flex">
                <div>
                    <p class="boxtitle">Welcome to Daizu Foundation</p>
                    <p class="optiontitle"><a href="register.html"> Create an account</a> or log in</p>
                </div>
                <img class="soybox"  src="icon/soy.png" alt="Soy Logo">
            </div>
            
            <div class="mainform">
                <div class="font-size">
                    <form action="index2.php" method="post">
                    
                        <p><label for="username">Username </label> <br>
                            <input type="text" id="username" name="username" required></p>

                        <p><label for="password">Password </label> <br>
                            <input type="password" id="inputpassword" name="password" required></p>

                            
                </div>
                <p><label><input type="checkbox" value="Show Password" onclick="showPassword()">Show Password</label></p>
                        <p><a href="reset.html">Forgot password?</a></p>
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
