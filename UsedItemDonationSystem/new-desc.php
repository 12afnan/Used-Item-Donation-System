<?php
include('connect.php'); // Include your database connection file
session_start();

// Check if item ID is set in the URL
if (isset($_GET['id'])) {
    $item_id = $_GET['id'];

    // Fetch item details from the database
    $query = "SELECT * FROM `items` WHERE `item_id` = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'i', $item_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $item = mysqli_fetch_assoc($result);
    } else {
        echo "Item not found.";
        exit();
    }
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
    <title>Edit Item - Daizu Foundation</title>
    <style><?php include ('style_forms.css') ?></style>
    <script>
        var loadImage = function(event) {
            var output = document.getElementById('imgOut');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
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
                    <?php
                    if (isset($_SESSION['username'])) {
                        echo $_SESSION['username'];
                    } else {
                    ?>
                        <a href="register.php" class="reg">Register</a>
                        <a href="log-in.php" class="log">Login</a>
                    <?php } ?>
                    <a href="dashboard.php"><img src="icon/user-icon.png" alt="user-icon"></a>
                </div>
            </div>
        </header>

        <div class="box">
            <div class="flex">
                <div>
                    <p class="boxtitle">Your Donated Item</p>
                </div>
            </div>
                
            <div class="mainform">
                    <input type="hidden" name="item_id" value="<?php echo $item['item_id']; ?>">
                    
                    <?php echo '<img src="data:image;base64,' . base64_encode($item['item_image']) . '" style="width:50%; height:50%;">'; ?>
                    <p>Name :<?php echo $item['item_name']; ?></p>
                    <p>Category : <?php echo $item['category']; ?></p>
                    <p>Condition : <?php echo $item['condition']; ?></p>
                    <p>Description : <?php echo $item['description']; ?></p>

                    <?php echo "<a href='edit-donated.php?id=" . $item['item_id'] . "'><button class='bttn'>Edit</button></a>"?>
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