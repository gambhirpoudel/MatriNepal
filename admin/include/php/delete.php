<?php
include '../../../include/db/auth.php';
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM users WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $message = "User deleted successfully";
        echo "<script>alert('$message'); window.location='../../user.php';</script>";
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
}
