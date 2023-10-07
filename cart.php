<?php
session_start();
require_once './include/php/header.php';
if (!isset($_SESSION['name'])) {
    header("Location: login.php");
    exit();
}
include './include/db/auth.php';

if (isset($_POST['remove_item'])) {
    $item_id = $_POST['remove_item'];
    $user_name = $_SESSION['name'];

    // Delete the item from the cart
    $delete_sql = "DELETE FROM cart WHERE id = '$item_id' AND user_name = '$user_name'";
    $conn->query($delete_sql);
}

if (isset($_POST['place_order'])) {
    $user_name = $_SESSION['name'];

    // Get user ID
    $user_id_sql = "SELECT id FROM users WHERE name = '$user_name'";
    $user_id_result = $conn->query($user_id_sql);
    $user_id_row = $user_id_result->fetch_assoc();
    $user_id = $user_id_row['id'];

    // Insert order details into the orders table
    $insert_order_sql = "INSERT INTO orders (user_id, order_date) VALUES ('$user_id', NOW())";
    if ($conn->query($insert_order_sql) === TRUE) {
        $order_id = $conn->insert_id;

        // Move cart items to order_items table and remove from cart table
        $cart_sql = "SELECT * FROM cart WHERE user_name = '$user_name'";
        $cart_result = $conn->query($cart_sql);

        while ($cart_item = $cart_result->fetch_assoc()) {
            $package_id = $cart_item['package_id'];
            $quantity = $cart_item['quantity'];

            // Get package details
            $package_sql = "SELECT title, price FROM packages WHERE id = '$package_id'";
            $package_result = $conn->query($package_sql);
            $package_data = $package_result->fetch_assoc();
            $package_title = $package_data['title'];
            $package_price = $package_data['price'];

            // Insert cart item into order_items table
            $insert_item_sql = "INSERT INTO order_items (order_id, package_id, package_title, quantity, price) VALUES ('$order_id', '$package_id', '$package_title', '$quantity', '$package_price')";
            $conn->query($insert_item_sql);

            // Remove cart item
            $remove_item_sql = "DELETE FROM cart WHERE user_name = '$user_name' AND package_id = '$package_id'";
            $conn->query($remove_item_sql);
        }

        // Clear cart session
        unset($_SESSION['cart']);
    } else {
        echo "Error placing order: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cart</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>

    <div class="cart-container">
        <h2>Your Cart</h2>
        <table>
            <thead>
                <tr>
                    <th>Package Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($_SESSION['name'])) {
                    $user_name = $_SESSION['name'];

                    $cart_sql = "SELECT * FROM cart WHERE user_name = '$user_name'";
                    $cart_result = $conn->query($cart_sql);

                    if ($cart_result->num_rows > 0) {
                        while ($cart_item = $cart_result->fetch_assoc()) {
                            $package_id = $cart_item['package_id'];
                            $package_sql = "SELECT title, price, image FROM packages WHERE id = '$package_id'";
                            $package_result = $conn->query($package_sql);
                            if ($package_result->num_rows > 0) {
                                $package_data = $package_result->fetch_assoc();
                                echo "<tr>";
                                echo "<td>{$package_data['title']}</td>";
                                echo "<td>{$package_data['price']}</td>";
                                echo "<td>{$cart_item['quantity']}</td>";
                                echo "<td><img src='./assets/img/{$package_data['image']}' alt='Product Image' width='50'></td>";
                                echo "<td>";
                                echo "<form method='POST' action='cart.php'>";
                                echo "<input type='hidden' name='remove_item' value='{$cart_item['id']}'>";
                                echo "<button type='submit'>Remove</button>";
                                echo "</form>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        }
                    } else {
                        echo "<tr><td colspan='5'>Your cart is empty</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Your cart is empty</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <?php if (!empty($_SESSION['name'])) : ?>
            <form method="POST" action="cart.php">
                <button type="submit" name="place_order">Place Order</button>
            </form>
        <?php endif; ?>
    </div>

</body>

</html>