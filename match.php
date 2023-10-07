<?php
session_start();
if (!isset($_SESSION['name'])) {
    Header("Location: login.php");
    exit();
}
include './include/db/auth.php';
include_once './include/php/header.php';
// Get the search term from the query string
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Find Match</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .ser {
            margin-top: 3%;
            font-size: 18px;
            margin-left: 45%;
        }

        .ser button i {
            background: transparent;
            font-size: 20px;
            color: #e84393;
            height: 30px;
            width: 30px;
        }

        .ser button {
            border: none;
            background: none;
        }

        .ser input {
            margin-top: 2px;
            padding: 10px;
            border-radius: 30px;
            border: none;
            outline: none;
            background: #e84393a0;
            color: white;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="lack">
        <form method="GET" action="">
            <div class="ser">
                <input type="text" name="search" placeholder="Search Profiles" value="<?php echo htmlspecialchars($searchTerm); ?>">
                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>

        </form>

        <div class="grid">
            <?php
            $currentUserGender = $_SESSION['gender'];

            if ($currentUserGender == 'Male') {
                $oppositeGender = 'Female';
            } else if ($currentUserGender == 'Female') {
                $oppositeGender = 'Male';
            }

            $sql = "SELECT * FROM users WHERE gender = '$oppositeGender'";

            if (!empty($searchTerm)) {
                $escapedSearchTerm = mysqli_real_escape_string($conn, $searchTerm);
                $sql .= " AND (name LIKE '%$escapedSearchTerm%' OR email LIKE '%$escapedSearchTerm%')";
            }

            if (!empty($_SESSION['religion'])) {
                $escapedReligion = mysqli_real_escape_string($conn, $_SESSION['religion']);
                $sql .= " AND religion = '$escapedReligion'";
            }

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<article>";
                    echo "<img src='./assets/img/" . $row['image'] . "' alt='Profile Image' />";
                    echo "<div class='text'>";
                    echo "<h3>" . $row['name'] . "</h3><br>";
                    echo "<p>Religion: " . $row['religion'] . "</p>";
                    echo "<p>Profession: " . $row['profession'] . "</p>";
                    echo "<p>Gender: " . $row['gender'] . "</p>";
                    echo "<p>Date of Birth: " . $row['dob'] . "</p>";
                    echo "<a href='u_details.php?id=" . $row['id'] . "'><button>View Details</button></a>";
                    echo "</div>";
                    echo "</article>";
                }
            } else {
                echo "<p>No profiles found.</p>";
            }
            ?>
        </div>
    </div>
</body>

</html>