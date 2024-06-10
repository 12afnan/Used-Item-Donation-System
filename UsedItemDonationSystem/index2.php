<?php
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    
    include('connect.php');

    // Use prepared statements to prevent SQL injection
    $sql = "SELECT * FROM `user` WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_POST['username']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        echo "Login Fail";
        session_unset(); // Clear session variables
        echo "<meta http-equiv=\"refresh\" content=\"3; URL=log-in.php\">";
    } else {
        $user = $result->fetch_assoc();
        $password = $user['password'];

        // Verify the password
        if (password_verify($_POST['password'], $password)) {
            // Successful login
            $_SESSION['username'] = $_POST['username'];
            include("index.php");
        } else {
            echo "Login Fail";
            session_unset(); // Clear session variables
            echo "<meta http-equiv=\"refresh\" content=\"3; URL=log-in.php\">";
        }
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid input"; // Handle missing username or password
}
?>
