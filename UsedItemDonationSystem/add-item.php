<?php
    include("connect.php");
    session_start();
    // Check if user is logged in
    if (!isset($_SESSION['user_id'])) 
    {
        header("Location: log-in.php");
        exit();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style_forms.css">
        <title>Add item - Daizu Foundation</title>

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
<body>
    <div id="wrapper">
        <header>
            <div class="header">
                    <a href="index.php" class="logo flex">
                        <img src="icon/soy.png" class="soylogo" alt="Daizu Foundation">
                        <div>Daizu<br/>Foundation</div>
                    </a>
                
                <div class="header-right">
                    <a href="register.php" class="reg">Register</a>
                    <a href="log-in.php" class="log">Login</a>
                    <img src="icon/user-icon.png" alt="user-icon">
                </div>
            </div>
            </header>

            <div class="box">
                <div class="flex">
                    <div>
                        <p class="boxtitle">Donate Your Item</p>
                    </div>
                </div>
                
                <div class="mainform">
                    <div class="font-size">
                        <form action="insert.php" method="post" enctype="multipart/form-data">
                            <input name="item_image" type="file" accept="image/*" id="imgIn" onchange="loadImage(event)">
                            <img id="imgOut" alt="Your image" style="width:50%; height:50%;">
                    
                            <p><label for="itemName">Item Name : </label>
                                <input name="item_name" type="text" id="itemName" required></p>
        
                            <p><label for="itemCat">Category : </label>
                                <input name="category" type="text" id="itemCat" list="categoryList" required>
                            <datalist id="categoryList">
                                <option value="Hobby, toys & activities">
                                <option value="Computers & games">
                                <option value="Home & Furniture">
                                <option value="Electronics">
                                <option value="Fashion">
                                <option value="Entertainment">
                                <option value="Vehicles">
                            </datalist></p>
        
                            <p><label for="itemCond">Condition : </label>
                                <input name="condition" type="text" id="itemCond" list="conditionList" required>
                            <datalist id="conditionList">
                                <option value="Brand new">
                                    <option value="Like new">
                                    <option value="Lightly used">
                                    <option value="Well used">
                                    <option value="Heavily used">
                            </datalist></p>
            
                            <p><label for="itemDesc">Description : </label>
                                <textarea name="description" name="Description" id="itemDesc"></textarea></p>
                    </div>
                        <p><button name="insert" type="submit">Submit</button></p>
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
