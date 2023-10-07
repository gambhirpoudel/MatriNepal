<?php
session_start(); // Make sure to start the session

include '../db/auth.php';

$contact = $_POST['contact'];
$religion = $_POST['religion'];
$profession = $_POST['profession'];
$address = $_POST['address'];

// Handle image upload
if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $targetDir = "../../assets/img/";
    $fileName = $_FILES["image"]["name"];
    $targetFilePath = $targetDir . $fileName;

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
        // Image uploaded successfully, continue with data update
        $userId = $_SESSION['id']; // Replace with your actual session variable name for user ID

        $sql = "UPDATE users SET contact = '$contact', religion = '$religion', profession = '$profession', address = '$address', image = '$fileName' WHERE id = '$userId'";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['gender'] = $gender;
            $message = "Profile updated successfully";
            echo "<script>alert('$message'); window.location='../../index2.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error uploading image.";
    }
} else {
    echo "Error: Image upload error.";
}

$conn->close();
