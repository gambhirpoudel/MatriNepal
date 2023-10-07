<?php
session_start();
include './include/db/auth.php';
include_once './include/php/header.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Contact Us</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
</head>

<body>
    <div class="contact-container">
        <form action="./include/php/ucontact.php" method="post" class="contact-form">
            <h1>Contact Us</h1>
            <div class="input-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="input-field" required>
            </div>

            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="input-field" required>
            </div>

            <div class="input-group">
                <label for="message">Message:</label>
                <textarea name="message" class="input-field" rows="4" required></textarea>
            </div>

            <button type="submit" class="submit-btn">Submit</button>
        </form>
    </div>
</body>

</html>