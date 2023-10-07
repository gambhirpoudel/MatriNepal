<?php
session_start();
if (!isset($_SESSION['name'])) {
    Header("Location: login.php");
}
include './include/db/auth.php';
$religions = array("Christianity", "Islam", "Hinduism", "Buddhism", "Judaism", "Sikhism", "Other");
// Check if there's data left to insert
$sql = "SELECT contact, religion, profession, address, image FROM users WHERE id = $_SESSION[id]";
$result = $conn->query($sql);

$dataLeftToInsert = false;
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $dataLeftToInsert = empty($row['contact']) || empty($row['religion']) || empty($row['profession']) || empty($row['address']) || empty($row['image']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
    <style>
        .lbox {
            background: white;
            width: 450px;
            height: fit-content;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 10px #e84393;
        }

        .lbox label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
        }

        .lbox input[type="text"],
        .lbox input[type="date"],
        .lbox select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .lbox select {
            background: #e8439338;
            cursor: pointer;
        }

        .lbox .file-input-container {
            margin-bottom: 15px;
        }

        .file-input {
            display: none;
        }

        .file-input-label {
            display: inline-block;
            padding: 8px 15px;
            background: #e84393;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .file-input-label:hover {
            background-color: #d63077;
        }

        .lbox .submit {
            background-color: #e84393;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .lbox .submit:hover {
            background-color: #d63077;
        }
    </style>
</head>

<body>
    <?php if ($dataLeftToInsert) : ?>
        <!-- Content to display when there's data left to insert -->
        <div class="lbox">
            <form action="./include/php/reg2.php" method="POST" enctype="multipart/form-data">
                <label for="name">Your Name:</label>
                <input type="text" name="name" id="name" class="name" value="<?php echo $_SESSION['name']; ?>">

                <label for="email">Your Email:</label>
                <input type="text" name="email" id="email" class="name" value="<?php echo $_SESSION['email']; ?>">

                <label for="contact">Contact:</label>
                <input type="text" name="contact" id="contact" class="name" placeholder="Contact">

                <label for="religion">Religion:</label>
                <select name="religion" id="religion" class="name">
                    <option value="" disabled selected>Select Religion</option>
                    <?php
                    foreach ($religions as $religion) {
                        echo "<option value=\"$religion\">$religion</option>";
                    }
                    ?>
                </select>

                <label for="dob">Date of Birth:</label>
                <input type="date" name="dob" id="dob" class="name" value="<?php echo $_SESSION['dob']; ?>">

                <label for="profession">Profession:</label>
                <input type="text" name="profession" class="name" id="profession" placeholder="Profession">

                <label for="address">Address:</label>
                <input type="text" name="address" class="name" id="address" placeholder="Address">

                <div class="file-input-container">
                    <input type="file" id="myFileInput" name="image" accept="image/*" class="file-input">
                    <label for="myFileInput" class="file-input-label">Choose Image</label>
                </div>

                <input type="submit" name="submit" class="submit" value="Update Profile">
            </form>
        </div>


    <?php else : ?>
        <?php include_once './include/php/header.php'; ?>
        <!-- Content to display when data insertion is complete -->
        <div class="htext">
            <h1>Welcome</h1>
            <h2>
                <?php
                $genderTitle = "";
                if (isset($_SESSION['gender'])) {
                    if ($_SESSION['gender'] == 'Male') {
                        $genderTitle = "Mr";
                        echo $genderTitle;
                    } elseif ($_SESSION['gender'] == 'Female') {
                        $genderTitle = "Mrs";
                        echo $genderTitle;
                    }
                }
                ?>
                <span><?php echo $_SESSION['name']; ?></span>
            </h2>
            <p>
                we empower individuals to embark on their journey towards lifelong companionship.
                Join us and let love lead the way.
            </p>
            <br>
            <a href="">Read more</a>
        </div>
        <!-- --------------- About Us -------------------- -->
        <div class="about">
            <div class="about-section">
                <img src="./assets/img/bac.jpg" alt="">
                <div class="inner-container">
                    <h1>About Us</h1>
                    <p class="text">
                        Welcome to <span>Matri</span><strong>Nepal</strong>, where we believe in helping individuals find their perfect life partners.
                        At Matrimony Company, we understand the importance of finding a compatible match for a lifelong journey.
                        We provide a platform that connects people from different backgrounds, cultures, and communities to discover and communicate with each other.
                        Our dedicated team works tirelessly to ensure the best experience for our users.
                        We offer a wide range of features and tools to help you search, connect, and interact with potential matches.
                        Whether you're looking for a life partner, a friend, or someone to share your interests with,
                        Matrimony Company is here to assist you in your journey towards finding meaningful connections.
                        Join us today and take the first step towards a fulfilling and enriching relationship.
                        <a href="contact.php">Contact us</a> for any inquiries or assistance. We are here to help!
                    </p>
                </div>
            </div>
        </div>

        <!-- --------------- Stories ------------------- -->
        <div class="ss">
            <h1>Matrimony Service with Success Stories </h1>
        </div>
        <div class="stories">
            <div class="p-info">
                <h2>Sankalpa Subedi</h2>
                <p>
                    Thank you, Matri Nepal, for having that.
                    Now we started meeting, our endless walks... and then by the end of August,
                    our parents met, and there was no effort required. At the very first meet,
                    our parents liked each other more than we liked each other. Our 2-states wedding
                    was not a love marriage but a Matri Nepal marriage. People still don't believe we met on Matri Nepal.
                </p>
            </div>
            <img src="./assets/img/user1.jpg" alt="">
        </div>

        <div class="stories">
            <img src="./assets/img/user2.jpg" alt="">
            <div class="p-info">
                <h2>Kapil Dev Sapkota</h2>
                <p>
                    We came together through Matri Nepal. As our conversations unfolded, we sensed
                    that undeniable spark between us. Our compatibility was evident, and
                    we are thrilled to announce our engagement scheduled for next month.
                    Our heartfelt gratitude goes to Matri Nepal for making this journey possible. </p>
            </div>
        </div>

        <div class="stories">
            <div class="p-info">
                <h2>Nikita Rimal</h2>
                <p>
                    Within just 10-15 days of joining Matri Nepal, he sent me a request.
                    Our conversations took off, and we immediately clicked. Our dreams and partner preferences aligned seamlessly.
                    Subsequently, our families connected and formed a positive bond. Excitingly,
                    we are now preparing for our wedding on January 27th, 2024, all thanks to Matri Nepal!
                </p>
            </div>
            <img src="./assets/img/user3.jpg" alt="">
        </div>
        <div class="foo">
            <?php require_once './include/php/footer.php'; ?>
        </div>
    <?php endif; ?>


</body>

</html>