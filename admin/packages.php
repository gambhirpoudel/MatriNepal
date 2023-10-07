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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Packages</title>
    <link rel="stylesheet" href="./include/css/style.css">
</head>

<body>
    <div class="admin-panel">
        <div class="packages-container">
            <div class="heading">
                <h1><span>Packages</span></h1>
                <a href="upload_packform.php" class="upload-button">Upload Packages</a>
            </div>
            <div class="grid">
                <?php
                $sql = "SELECT * FROM packages";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<article class='package'>";
                        echo "<img src='../assets/img/" . $row['image'] . "' alt='Package Image' class='user-image' />";
                        echo "<div class='text'>";
                        echo "<h3>" . $row['title'] . "</h3>";
                        echo "<p> Description: <br> " . $row['description'] . "</p>";
                        echo "<p>Price: Nrs " . $row['price'] . "</p>";
                        echo '<a href="pack_edit.php?id=' . $row['id'] . '">
                             <button class="form-submit">Edit</button>
                            </a>';
                        echo "</div>";
                        echo "</article>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>