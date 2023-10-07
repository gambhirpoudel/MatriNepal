<?php
include '../db/auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $gender = $_POST['gender']; 
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $currentDate = new DateTime();
    $birthdate = new DateTime($dob);
    $age = $birthdate->diff($currentDate)->y;

    if ($age >= 21) {
        $sql = "INSERT INTO users (name, email, dob, gender, password) VALUES ('$name', '$email', '$dob', '$gender', '$password')";

        if ($conn->query($sql) === TRUE) {
            
            $message = "Data inserted successfully";
            echo "<script>alert('$message'); window.location='../../login.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        $message = "You must be at least 21 years old to register.";
        echo "<script>alert('$message'); window.location='../../index.php';</script>";
    }

    $conn->close();
}
