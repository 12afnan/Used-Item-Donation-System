<?php
include('connect.php'); // Include your database connection file
session_start();

if (!isset($_SESSION['username'])) {
    echo "You need to log in to apply.";
    exit();
}

$username = $_SESSION['username'];

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $appointment_date = $_POST['appointment_date'];
    $location = $_POST['location'];

    // Fetch the user ID from the database
    $user_query = "SELECT user_id FROM `user` WHERE `username` = ?";
    $user_stmt = mysqli_prepare($conn, $user_query);
    mysqli_stmt_bind_param($user_stmt, 's', $username);
    mysqli_stmt_execute($user_stmt);
    $user_result = mysqli_stmt_get_result($user_stmt);

    if (mysqli_num_rows($user_result) > 0) {
        $user = mysqli_fetch_assoc($user_result);
        $user_id = $user['user_id'];

        // Disable foreign key checks
        mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=0");

        // Insert into donation table
        $insert_query = "INSERT INTO `donation` (appointment_date, location, user_id, item_id) VALUES (?, ?, ?, ?)";
        $insert_stmt = mysqli_prepare($conn, $insert_query);
        mysqli_stmt_bind_param($insert_stmt, 'ssii', $appointment_date, $location, $user_id, $item_id);

        if (mysqli_stmt_execute($insert_stmt)) {
            // Delete item from items table
            $delete_query = "DELETE FROM `items` WHERE `item_id` = ?";
            $delete_stmt = mysqli_prepare($conn, $delete_query);
            mysqli_stmt_bind_param($delete_stmt, 'i', $item_id);

            if (mysqli_stmt_execute($delete_stmt)) {
                echo "Application successful and item deleted.";
            } else {
                echo "Error deleting item: " . mysqli_error($conn);
            }
        } else {
            echo "Error inserting donation: " . mysqli_error($conn);
        }

        // Enable foreign key checks
        mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=1");
    } else {
        echo "User not found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application - Daizu Foundation</title>
    <style><?php include('style_forms.css') ?></style>
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
                    <p class="boxtitle">Apply for Donation</p>
                </div>
            </div>
                
            <div class="mainform">
                <form method="POST" action="">
                    <p>Item: <?php echo $item['item_name']; ?></p>
                    <label for="appointment_date">Appointment Date:</label>
                    <input type="date" id="appointment_date" name="appointment_date" required><br>
                    
                    <label for="location">Location:</label>
                    <input type="text" id="location" name="location" required><br>
                    
                    <button type="submit" class="bttn">Submit Application</button>
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
