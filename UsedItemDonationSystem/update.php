<?php
include('connect.php');
session_start();

$id = $_SESSION['user_id'];
$nm = $_POST['u_name'];
$gen = $_POST['u_gender'];
$phone = $_POST['u_phone'];
$eml = $_POST['u_email'];

if ($_FILES['user_image']['error'] === UPLOAD_ERR_OK) 
{
    $image_tmp_name = $_FILES['user_image']['tmp_name'];
    $image_data = file_get_contents($image_tmp_name);
    $image_data = mysqli_real_escape_string($conn, $image_data);

    $sql = "UPDATE `user` SET user_image = ?, name = ?, gender = ?, phonenum = ?, email = ? WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssssi', $image_data, $nm, $gen, $phone, $eml, $id);

    if ($stmt->execute()) 
    {
        echo '<script>alert("Profile edited successfully")</script>';
        echo "<meta http-equiv=\"refresh\" content=\"0;url=dashboard.php\">";
    } 
    else 
    {
        echo "Error: " . $stmt->error;
        echo "<meta http-equiv=\"refresh\" content=\"0;url=dashboard.php\">";
    }
} 
else 
{
    echo '<script>alert("Error uploading image")</script>';
    echo "<meta http-equiv=\"refresh\" content=\"0;url=dashboard.php\">";
}

$stmt->close();
$conn->close();
?>
