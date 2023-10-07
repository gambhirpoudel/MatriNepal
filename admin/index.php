<?php
session_name('AdminSession');
session_start();
if (!isset($_SESSION['aname'])) {
    Header("Location: login.php");
}
include_once 'include/php/sidebar.php';
include '../include/db/auth.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="./include/css/style.css">
</head>

<body>
    <div class="admin-panel">
        <div class="admin-container">
            <div class="messages">
                <h1>Messages</h1>
                <?php
                $sql = "SELECT * FROM contacts";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="message">';
                        echo '<p><strong>Name:</strong> ' . $row["name"] . '</p>';
                        echo '<p><strong>Email:</strong> ' . $row["email"] . '</p>';
                        echo '<p><strong>Message:</strong> ' . $row["message"] . '</p>';
                        echo '<a class="delete-button" href="./php/delmessage.php?id=' . $row["id"] . '">Delete</a>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No messages found.</p>';
                }

                $conn->close();
                ?>
            </div>
        </div>
    </div>
</body>

</html>