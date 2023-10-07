<?php
session_start();
include './include/db/auth.php';
include_once './include/php/header.php';
if (!isset($_SESSION['name'])) {
    Header("Location: login.php");
}
// Check if user ID is provided in the URL
if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Retrieve user details based on user ID
    $sql = "SELECT * FROM users WHERE id = '$userId'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $email = $row['email'];
        $contact = $row['contact'];
        $dob = $row['dob'];
        $gender = $row['gender'];
        $religion = $row['religion'];
        $address = $row['address'];
        $profileImage = $row['image'];
    } else {
        $name = "N/A";
        $email = "N/A";
        $contact = "N/A";
        $dob = "N/A";
        $gender = "N/A";
        $religion = "N/A";
        $address = "N/A";
        $profileImage = "default.jpg";
    }
} else {
    // Redirect to the search page if no user ID is provided
    header("Location: search.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Details</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <div class="user-details-section">
        <img src="./assets/img/<?php echo $profileImage; ?>" alt="Profile Image">
        <div class="inner-container">
            <h1>User Details</h1>
            <div class="fle">
                <div class="details">
                    <p><strong>Name:</strong> <?php echo $name; ?></p>
                    <p><strong>Email:</strong> <?php echo $email; ?></p>
                    <p><strong>Contact:</strong> <?php echo $contact; ?></p>
                    <p><strong>Date of Birth:</strong> <?php echo $dob; ?></p>
                    <p><strong>Gender:</strong> <?php echo $gender; ?></p>
                    <p><strong>Address:</strong> <?php echo $address; ?></p>
                    <p><strong>Religion:</strong> <?php echo $religion; ?></p>
                </div>
                <div class="bio">
                    <h1>About User</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Illo dolor sequi culpa, quo nulla ad, dolores eligendi accusamus,
                        delectus earum maiores necessitatibus? Soluta animi sapiente ab, quod sit aut distinctio?</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
