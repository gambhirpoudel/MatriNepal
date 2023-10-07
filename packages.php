<?php
session_start();
include './include/db/auth.php';
include_once './include/php/header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Packages</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <div class="lpack">
        <div class="lgrid">
            <?php
            $sql = "SELECT * FROM packages";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<article>";
                    echo "<img src='./assets/img/" . $row['image'] . "' alt='Package Image' />";
                    echo "<div class='ltext'>";
                    echo "<h3>" . $row['title'] . "</h3><br>";
                    echo "<p> Description : <br>  <p>" . $row['description'] . "</p></p>";
                    echo "<br><p>Price: Nrs " . $row['price'] . "</p>";
                    echo "<a href='./include/php/addtocart.php?id=" . $row['id'] . "'><button>Add to cart</button></a>";
                    echo "</div>";
                    echo "</article>";
                }
            }
            ?>
        </div>
    </div>
</body>

</html>
