<?php
session_start();
include_once './include/db/auth.php';
require_once './include/php/header.php';
if (isset($_SESSION['name'])) {
    Header("Location: index2.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>MatriNepal</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>

    <div class="box">
        <h2>Register & Join our Matrimony</h2>
        <form action="./include/php/reg.php" method="POST" enctype="multipart/form-data">
            <div class="form">
                <input type="text" class="name" name="name" placeholder="Your name">
                <input type="text" class="email" name="email" placeholder="Your email id">
                <input type="date" class="dob" name="dob" placeholder="Date of Birth">
                <label for="gender">Gender:</label>
                <input type="radio" name="gender" value="Male"> Male
                <input type="radio" name="gender" value="Female"> Female
                <input type="radio" name="gender" value="Other"> Other
                <input type="password" class="password" name="password" placeholder="Password">
                <input type="submit" class="submit" name="submit" value="Get Started">
                <br>
                <p>By registering, you agree to our <span>Terms & Conditions.</span></p>
            </div>
        </form>
    </div>

    <div class="htext">
        <h1>Matrimonial Search.</h1>
        <h2>Best Matching <span>Couples</span></h2>
        <p>
            we empower individuals to embark on their journey towards lifelong companionship.
            Join us and let love lead the way.
        </p>
        <br>
        <a href="./about.php">Read more</a>

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

</body>
<div class="foo">
    <?php
    require_once './include/php/footer.php'; ?>
</div>

</html>
