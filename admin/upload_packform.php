<?php
session_name('AdminSession');
session_start();
if (!isset($_SESSION['aname'])) {
    Header("Location: login.php");
}
include_once 'include/php/sidebar.php';
include '../include/db/auth.php';
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <link rel="stylesheet" href="./include/css/style.css">
</head>

<body>
    <div class="admin-panel">
        <div class="admin-container">
            <form action="./include/php/upackage.php" method="POST" enctype="multipart/form-data" class="box">
                <h3>Upload Packages</h3>
                <label for="title">Title:</label>
                <input type="text" name="title" id="title">
                <br>
                <label for="price">Price:</label>
                <input type="text" name="price" id="price">
                <br>
                <label for="description">Description:</label>
                <textarea name="description" id="description"></textarea>
                <br>
                <label for="image">Image:</label>
                <input type="file" name="image" id="image">
                <br>
                <input type="submit" value="Upload">
            </form>
        </div>
    </div>
</body>

</html>