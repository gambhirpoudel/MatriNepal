<?php
session_start();
include '../db/auth.php';

if (isset($_GET['id'])) {
    $package_id = $_GET['id'];
    $user_name = $_SESSION['name']; // Assuming 'name' is the username in the session
    $quantity = 1; // You can modify this based on your needs

    // Check if the package is already in the cart
    $cart_sql = "SELECT * FROM cart WHERE user_name = '$user_name' AND package_id = '$package_id'";
    $cart_result = $conn->query($cart_sql);

    if ($cart_result->num_rows > 0) {
        // Update quantity if package is already in the cart
        $update_sql = "UPDATE cart SET quantity = quantity + 1 WHERE user_name = '$user_name' AND package_id = '$package_id'";
        $conn->query($update_sql);
    } else {
        // Insert package into cart if not already in the cart
        $insert_sql = "INSERT INTO cart (user_name, package_id, quantity) VALUES ('$user_name', '$package_id', '$quantity')";
        $conn->query($insert_sql);
    }

    // Redirect back to the packages page
    header("Location: ../../packages.php");
    exit();
} else {
    // Redirect back to the packages page if no package ID is provided
    header("Location: ../../packages.php");
    exit();
}
