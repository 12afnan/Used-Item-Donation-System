<?php
include('connect.php');

// Check if item ID is set in the URL
if (isset($_GET['id'])) {
    $item_id = $_GET['id'];

    // Fetch item details from the database
    $query = "SELECT * FROM `items` WHERE `item_id` = $item_id";
    $query_run = mysqli_query($conn, $query);
    $item = mysqli_fetch_assoc($query_run);
} else {
    echo "Item ID not set.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Description</title>
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
                <a href="add-item.php"><button style="margin-right: 10px;">Donate !</button></a>
                <?php 
                if (isset($_SESSION['username'])) {
                    echo $_SESSION['username']; 
                } else {
                    ?>
                    <a href="register.php" class="reg">Register</a>
                    <a href="log-in.php" class="log">Login</a>
                    <?php
                } 
                ?>
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

<div class="container-item">
    <div class="card-item">
        <div class="item-description">
            <div class="profile">
                <?php echo '<img src="data:image;base64,' . base64_encode($item['item_image']) . '" class="image">'; ?>
            <div class="text">
            <h2 class="heading"><?php echo $item['item_name']; ?></h2>
                <p>Category: <?php echo $item['category']; ?></p>
                <p>Condition: <?php echo $item['condition']; ?></p>
                <p>Description: <?php echo $item['description']; ?></p>
                <div class="tengah">
                    <a><button class="bttn">Apply</button></a>
                </div>
            </div>
            </div>
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
</body>
</html>