<?php
include '../db/auth.php';

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $rememberMe = isset($_POST['remember']) ? true : false;

    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password'");

    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
        session_start();
        $_SESSION["id"] = $row['id'];
        $_SESSION["name"] = $row['name'];
        $_SESSION["email"] = $row['email'];
        $_SESSION["dob"] = $row['dob'];
        $_SESSION["gender"] = $row['gender'];

        if ($rememberMe) {
            setcookie("remember_email", $email, time() + (7 * 24 * 60 * 60), "/");
            setcookie("remember_password", $password, time() + (7 * 24 * 60 * 60), "/");
        }
        header('Location: ../../index2.php');
        exit();
    } else {
        $message = "Invalid email or password";
        echo "<script>alert('$message'); window.location='../../login.php';</script>";
        exit();
    }
}
