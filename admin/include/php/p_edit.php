<?php
include '../../../include/db/auth.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Retrieve the existing package details
    $query = "SELECT * FROM packages WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Get new values or keep existing values as default
        $newTitle = isset($_POST['title']) ? $_POST['title'] : $row['title'];
        $newDescription = isset($_POST['description']) ? $_POST['description'] : $row['description'];
        $newPrice = isset($_POST['price']) ? $_POST['price'] : $row['price'];

        // Check if a new image was uploaded
        if ($_FILES['image']['name']) {
            $image = $_FILES['image']['name'];
            $target = "../../../assets/img/" . basename($image);

            // Upload the new image
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                // Remove the old image
                if (!empty($row['image'])) {
                    unlink("../../../assets/img/" . $row['image']);
                }
            } else {
                echo "Image upload failed.";
                exit;
            }
        } else {
            $image = $row['image'];
        }

        // Update the package details
        $updateQuery = "UPDATE packages SET title='$newTitle', description='$newDescription', price='$newPrice', image='$image' WHERE id=$id";
        if (mysqli_query($conn, $updateQuery)) {
            header("Location: ../../packages.php");
        } else {
            echo "Error updating package: " . mysqli_error($conn);
        }
    } else {
        echo "Package not found.";
    }
} else {
    echo "Invalid request.";
}
