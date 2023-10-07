<?php
include '../../../include/db/auth.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $profession = $_POST['profession'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $religion = $_POST['religion'];


    $query = "UPDATE users SET name = '$name', email = '$email', contact = '$contact', profession = '$profession', dob = '$dob', address = '$address', gender = '$gender', religion = '$religion'  WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $message = "Successfully Updated";
        echo "<script>alert('$message'); window.location='../../user.php';</script>";
    } else {
        $message = "Can't Update, please try again";
        echo "<script>alert('$message'); window.location='../../user.php';</script>";
    }
}
