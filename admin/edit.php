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
    <title>Edit User</title>
    <link rel="stylesheet" href="./include/css/style.css">
</head>

<body>
    <div class="admin-panel">
        <div class="admin-container">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
                $id = $_GET['id'];

                $query = "SELECT * FROM users WHERE id = $id";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_assoc($result);
            ?>
                    <form method="post" action="./include/php/u_user.php" enctype="multipart/form-data" class="form-container">

                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                        <label for="image" class="form-label"><?php echo $row['name']; ?> Details:</label>
                        <?php
                        if (!empty($row['image'])) {
                            echo "<img src='../assets/img/{$row['image']}' alt='User Image' class='user-image'>";
                        }
                        ?><br>

                        <label for="name" class="form-label">Username:</label>
                        <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" class="form-input"><br>

                        <label for="email" class="form-label">Email:</label>
                        <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" class="form-input"><br>

                        <label for="contact" class="form-label">Contact:</label>
                        <input type="text" id="contact" name="contact" value="<?php echo $row['contact']; ?>" class="form-input"><br>

                        <label for="profession" class="form-label">Profession:</label>
                        <input type="text" id="profession" name="profession" value="<?php echo $row['profession']; ?>" class="form-input"><br>

                        <label for="dob" class="form-label">DOB:</label>
                        <input type="date" id="dob" name="dob" value="<?php echo $row['dob']; ?>" class="form-input"><br>

                        <label for="address" class="form-label">Address:</label>
                        <textarea id="address" name="address" class="form-textarea"><?php echo $row['address']; ?></textarea><br>

                        <label for="gender" class="form-label">Gender:</label>
                        <input type="text" id="gender" name="gender" value="<?php echo $row['gender']; ?>" class="form-input"><br>

                        <label for="religion" class="form-label">Religion:</label>
                        <input type="text" id="religion" name="religion" value="<?php echo $row['religion']; ?>" class="form-input"><br>

                        <input type="submit" value="Update" class="form-submit">
                    </form>
            <?php
                } else {
                    echo "User not found.";
                }
            }
            ?>
        </div>
    </div>
</body>

</html>