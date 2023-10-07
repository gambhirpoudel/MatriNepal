<?php
include '../../../include/db/auth.php';


$targetDir = "../../../assets/img/";
$fileName = $_FILES["image"]["name"];
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);


$title = $_POST['title'];
$description = $_POST['description'];
$price = $_POST['price'];
$sql = "INSERT INTO packages (title, description, price, image) VALUES ('$title', '$description', '$price', '$fileName')";

if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath) && $conn->query($sql) === TRUE) {
    $message = "Successfully Uploaded";
    echo "<script>alert('$message'); window.location='../../packages.php';</script>";
} else {
    $message = "Upload Failed Try again";
    echo "<script>alert('$message'); window.location='../../upload_packform.php';</script>";
}

$conn->close();
