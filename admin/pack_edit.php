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
    <title>Edit Package</title>
    <link rel="stylesheet" href="./include/css/style.css">
</head>

<body>
    <div class="admin-panel">
        <div class="admin-container">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
                $id = $_GET['id'];

                $query = "SELECT * FROM packages WHERE id = $id";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_assoc($result);
            ?>
                    <form method="post" action="./include/php/p_edit.php" enctype="multipart/form-data" class="form-container">

                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                        <label for="title" class="form-label">Package Title:</label>
                        <input type="text" id="title" name="title" value="<?php echo $row['title']; ?>" class="form-input"><br>

                        <label for="description" class="form-label">Description:</label>
                        <textarea id="description" name="description" class="form-textarea"><?php echo $row['description']; ?></textarea><br>

                        <label for="price" class="form-label">Price:</label>
                        <input type="text" id="price" name="price" value="<?php echo $row['price']; ?>" class="form-input"><br>

                        <label for="image" class="form-label">Image:</label>
                        <?php
                        if (!empty($row['image'])) {
                            echo "<img src='../assets/img/{$row['image']}' alt='Package Image' class='user-image'>";
                        }
                        ?>
                        <input type="file" id="image" name="image" accept="image/*" class="file-input"><br>

                        <input type="submit" value="Update" class="form-submit">
                    </form>
            <?php
                } else {
                    echo "Package not found.";
                }
            }
            ?>
        </div>
    </div>
</body>

</html>