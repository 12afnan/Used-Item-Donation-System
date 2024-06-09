<?php
    include("connect.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style_forms.css">
        <title>Add item - Daizu Foundation</title>

        <style>
            aside{
                width: 30%;
                padding-left: 15px;
                margin-left: 15px;
                font-style: italic;
                background-color: lightgray;
            }

            input[type=text]{
                width: 40%;
            }
        </style>

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

            <h3>Add your item : </h3>
            <aside>
                <form action="insert.php" method="post" enctype="multipart/form-data">
                    
                    <input name="item_image" type="file" accept="image/*" id="imgIn" onchange="loadImage(event)" required>
                    <img id="imgOut" alt="Your image">
            
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
                        <textarea name="description" name="Description" id="itemDesc" required></textarea></p>
                        
                    <p><button name="insert" type="submit">Submit</button></p>
                </form>
            </aside>

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
