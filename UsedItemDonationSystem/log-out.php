<?php
    // Initialize the session
    session_start();
    if(isset($_SESSION['username']))
    {
         
        // Destroy the whole session
        $_SESSION = array();
        session_destroy();
        header('Location: index.php');
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=log-in.php\">";
    }
?>