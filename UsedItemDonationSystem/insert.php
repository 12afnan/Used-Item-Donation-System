<?php
    include("connect.php"); // Include the database connection file
    session_start();

    // Get form inputs
    $name = $_POST['item_name']; // Retrieve item name
    $category = $_POST['category']; // Retrieve item category
    $condition = $_POST['condition']; // Retrieve item condition
    $description = $_POST['description']; // Retrieve item description

    // Handle image upload
    if ($_FILES['item_image']['error'] === UPLOAD_ERR_OK) 
    {
        $image_tmp_name = $_FILES['item_image']['tmp_name']; // Get temporary path of the uploaded image
        $image_data = file_get_contents($image_tmp_name); // Read image data from the temporary file

        // Insert data into the database (assuming 'item_image' column is of type BLOB)
        $sql = "INSERT INTO `items` (`item_image`, `item_name`, `category`, `condition`, `description`, `user_id`) VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql); // Prepare the SQL statement
        $stmt->bind_param("sssssi", $image_data, $name, $category, $condition, $description, $_SESSION['user_id']); // Bind parameters

        if ($stmt->execute()) 
        {
            echo "<script>alert('Item added successfully');</script>"; // Display success message
            echo "<meta http-equiv=\"refresh\" content=\"0;url=add-item.php\">"; // Redirect to index.php
        } 
        else 
        {
            echo "Error inserting data into the database."; // Display error message
            echo "<meta http-equiv=\"refresh\" content=\"0;url=add-item.php\">";

        }
    } 
?>
