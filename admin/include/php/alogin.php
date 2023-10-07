<?php
include '../../../include/db/auth.php';
$aemail = $_POST['aemail'];
$apassword = $_POST['apassword'];
$arememberMe = isset($_POST['aremember']) ? true : false;

$result = mysqli_query($conn, "SELECT * FROM admin where aemail='$aemail' AND apassword='$apassword'");
if (isset($_POST['submit'])) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        session_name('AdminSession');
        session_start();
        $_SESSION['aname'] = $row['aname'];
        echo "successfully connected to";
        header("location: ../../index.php");
        if ($arememberMe) {
            setcookie("remember_aemail", $aemail, time() + (7 * 24 * 60 * 60), "/");
            setcookie("remember_apassword", $apassword, time() + (7 * 24 * 60 * 60), "/");
        }
    } else {
        $message = "Your Email or Password is incorrect";
        echo "<script>alert('$message'); window.location='../../login.php';</script>";
    }
}
