<?php
    include('connect.php')
?>
<style><?php include ('style_index.css') ?></style>
<!DOCTYPE html>
<html>
    <head>
        <title>Used Item Donation System</title>
        <link rel="stylesheet" type="text/css" href="style_index.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body id="wrapper">
        <header>
            <div class="header">
                    <a href="index.php" class="logo flex">
                        <img src="icon/soy.png" class="soylogo" alt="Daizu Foundation">
                        <div>Daizu<br/>Foundation</div>
                    </a>
                
                <div class="header-right">
                    <a href="register.html" class="reg">Register</a>
                    <a href="log-in.html" class="log">Login</a>
                    <a href="dashboard.html"><img src="icon/user-icon.png" alt="user-icon"></a>
                </div>
            </div>
        </header>

        <div class="topnav">
            <div class="search-container">
                <form action="">
                    <input type="search" placeholder="Search...">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>

        <?php
 
        $query = " SELECT * FROM `items` ";
        $query_run = mysqli_query($conn, $query);
        echo "<div class=\"cards\">";
        while($row = mysqli_fetch_array($query_run))
        {
            ?>
            
            <div class="card">
                    <?php echo '<img src="data:image;base64,'.base64_encode($row['item_image']).'"  class="card-image">'; ?>
                <div class="card-content">
                        <p>
                            <?php echo $row['item_name'] ?> 
                        </p>
                </div>
                <div class="card-info">
                    <div>
                        <i class="fa fa-heart"></i> 200
                    </div>
                    <div>
                        <a href="" class="card-link">Get</a>
                    </div>
                </div>
            </div>
        
            <?php
        }
        ?>
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
