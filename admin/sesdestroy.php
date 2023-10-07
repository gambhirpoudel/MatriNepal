<?php
session_name('AdminSession'); // Set a custom session name for the admin panel
session_start();

if (isset($_SESSION['aname'])) {
    $_SESSION = array();
    session_destroy();
    header("location: login.php"); // Adjust the path as needed
    exit;
}
?>
