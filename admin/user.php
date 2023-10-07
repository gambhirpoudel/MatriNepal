<?php
session_name('AdminSession');
session_start();
if (!isset($_SESSION['aname'])) {
    Header("Location: login.php");
}
include_once 'include/php/sidebar.php';
include '../include/db/auth.php';

?>
<html>

<head>
    <title>Users Details</title>
    <link rel="stylesheet" href="./include/css/style.css">
</head>

<body>
    <div class="admin-panel">
        <div class="admin-container">
            <?php
            $query = "SELECT * FROM users";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                echo "<table>";

                echo "<tr>
                <th>ID</th>
                <th>Profile</th>
                <th>Username</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Profession</th>
                <th>DOB</th>
                <th>Address</th>
                <th>Gender</th>
                <th>Religion</th>
                <th>Action</th>
                </tr>";


                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td><img src='../assets/img/{$row['image']}' alt='User Image'></td>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>{$row['email']}</td>";
                    echo "<td>{$row['contact']}</td>";
                    echo "<td>{$row['profession']}</td>";
                    echo "<td>{$row['dob']}</td>";
                    echo "<td>{$row['address']}</td>";
                    echo "<td>{$row['gender']}</td>";
                    echo "<td>{$row['religion']}</td>";
                    echo "<td><a href='edit.php?id={$row['id']}'>Edit</a> | <a href='./include/php/delete.php?id={$row['id']}'>Delete</a></td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "No users found.";
            }

            mysqli_close($conn);
            ?>
        </div>
    </div>
</body>

</html>