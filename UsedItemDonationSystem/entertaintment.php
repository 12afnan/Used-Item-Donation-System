<?php
    include('connect.php');
    session_start();
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

        <div class="topnav">
            <div class="categories">
                <a href="index.php">All</a>
                <a href="hobby.php">Hobby, toys & activities</a>
                <a href="computers.php">Computers & games</a>
                <a href="furniture.php">Home & Furniture</a>
                <a href="electronics.php">Electronics</a>
                <a href="fashion.php">Fashion</a>
                <a href="entertaintment.php">Entertainment</a>
                <a href="vehicles.php">Vehicles</a>
            </div>

            <div class="search-container">
                <form action="">
                    <input type="search" placeholder="Search...">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>

        <h2>Entertainment</h2>
        
            <?php
            $query = " SELECT * FROM `items` WHERE `category` = 'Entertainment'";
            $query_run = mysqli_query($conn, $query);
            ?>

        <div class="cards">

        <?php
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
                        <a href="" class="card-link"><button>Get</button></a>
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
