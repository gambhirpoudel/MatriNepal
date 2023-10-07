<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Insert data into the database
    include '../db/auth.php';

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        $message = "Message sent successfully";
        echo "<script>alert('$message'); window.location='../../index.php';</script>";
    } else {
        $message = "Message Failed to be sent please try again";
        echo "<script>alert('$message'); window.location='../../contact.php';</script>";
    }

    $conn->close();
}
