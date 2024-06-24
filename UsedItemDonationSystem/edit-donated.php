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

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Update action
    if (isset($_POST['update'])) {
        // Validate and sanitize inputs (not shown here for brevity)

        // Prepare update query
        $update_query = "UPDATE `items` SET `item_name`=?, `category`=?, `condition`=?, `description`=? WHERE `item_id`=?";
        $stmt = mysqli_prepare($conn, $update_query);
        mysqli_stmt_bind_param($stmt, 'ssssi', $_POST['item_name'], $_POST['category'], $_POST['condition'], $_POST['description'], $_POST['item_id']);

        // Execute query
        if (mysqli_stmt_execute($stmt)) {
            // Redirect to a success page or item list
            header("Location: new-desc.php?id=" . $item_id);   
            exit();
        } else {
            echo "Error updating item: " . mysqli_error($conn);
        }
    }

    // Delete action
    if (isset($_POST['delete'])) {
        // Prepare delete query
        $delete_query = "DELETE FROM `items` WHERE `item_id`=?";
        $stmt = mysqli_prepare($conn, $delete_query);
        mysqli_stmt_bind_param($stmt, 'i', $_POST['item_id']);

        // Execute delete query
        if (mysqli_stmt_execute($stmt)) {
            // Redirect to a success page or item list
            header("Location: donate-page.php");
            exit();
        } else {
            echo "Error deleting item: " . mysqli_error($conn);
        }
    }
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
                URL.revokeObjectURL(output.src); // free memory
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
                    <p class="boxtitle">Edit Your Donated Item</p>
                </div>
            </div>
                
            <div class="mainform">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="item_id" value="<?php echo $item['item_id']; ?>">
                    
                    <img id="imgOut" src="data:image;base64,<?php echo base64_encode($item['item_image']); ?>" alt="Item Image" style="width:50%; height:50%;"><br><br>

                    <label for="item_name">Name</label><br>
                    <input type="text" name="item_name" required value="<?php echo htmlspecialchars($item['item_name']); ?>"><br><br>

                    <label for="category">Category</label><br>
                    <input type="text" name="category" list="categoryList" required value="<?php echo htmlspecialchars($item['category']); ?>">
                    <datalist id="categoryList">
                        <option value="Hobby, toys & activities">
                        <option value="Computers & games">
                        <option value="Home & Furniture">
                        <option value="Electronics">
                        <option value="Fashion">
                        <option value="Entertainment">
                        <option value="Vehicles">
                    </datalist><br><br>

                    <label for="condition">Condition</label><br>
                    <input type="text" name="condition" list="conditionList" required value="<?php echo htmlspecialchars($item['condition']); ?>">
                    <datalist id="conditionList">
                        <option value="New">
                        <option value="Used - Like New">
                        <option value="Used - Good">
                        <option value="Used - Fair">
                    </datalist><br><br>

                    <label for="description">Description</label><br>
                    <textarea name="description" rows="4" cols="50"><?php echo htmlspecialchars($item['description']); ?></textarea><br><br>

                    <button name="update" type="submit">Update</button>

                    <button name="delete" type="submit" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
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
