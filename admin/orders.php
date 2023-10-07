<?php
session_name('AdminSession');
session_start();
if (!isset($_SESSION['aname'])) {
    Header("Location: login.php");
}
include_once './include/php/sidebar.php';
include '../include/db/auth.php';

// Handle order deletion
if (isset($_POST['delete_order'])) {
    $order_id_to_delete = $_POST['delete_order'];

    // Delete order from order_items table
    $delete_order_items_sql = "DELETE FROM order_items WHERE order_id = '$order_id_to_delete'";
    $conn->query($delete_order_items_sql);

    // Delete order from orders table
    $delete_order_sql = "DELETE FROM orders WHERE id = '$order_id_to_delete'";
    $conn->query($delete_order_sql);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Panel - Orders</title>
    <link rel="stylesheet" href="./include/css/style.css">
</head>

<body>
    <div class="admin-panel">
        <div class="admin-container">
            <h2>Orders</h2>
            <table class="admin-panel-table">
                <thead>
                    <tr>
                        <th class="admin-panel-th">Order ID</th>
                        <th class="admin-panel-th">User</th>
                        <th class="admin-panel-th">Order Date</th>
                        <th class="admin-panel-th">Package Image</th>
                        <th class="admin-panel-th">Total Amount</th>
                        <th class="admin-panel-th">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $orders_sql = "SELECT * FROM orders";
                    $orders_result = $conn->query($orders_sql);

                    if ($orders_result->num_rows > 0) {
                        while ($order = $orders_result->fetch_assoc()) {
                            $user_id = $order['user_id'];
                            $user_sql = "SELECT name FROM users WHERE id = '$user_id'";
                            $user_result = $conn->query($user_sql);
                            $user_data = $user_result->fetch_assoc();
                            $user_name = $user_data['name'];

                            echo "<tr>";
                            echo "<td class='admin-panel-td'>{$order['id']}</td>";
                            echo "<td class='admin-panel-td'>{$user_name}</td>";
                            echo "<td class='admin-panel-td'>{$order['order_date']}</td>";

                            // Get the package IDs associated with the order
                            $order_id = $order['id'];
                            $order_items_sql = "SELECT package_id FROM order_items WHERE order_id = '$order_id'";
                            $order_items_result = $conn->query($order_items_sql);

                            // Initialize an array to store package IDs
                            $package_ids = array();
                            while ($order_item = $order_items_result->fetch_assoc()) {
                                $package_ids[] = $order_item['package_id'];
                            }

                            echo "<td class='admin-panel-td'>";
                            foreach ($package_ids as $package_id) {
                                $package_image_sql = "SELECT image FROM packages WHERE id = '$package_id'";
                                $package_image_result = $conn->query($package_image_sql);
                                $package_image_data = $package_image_result->fetch_assoc();
                                $package_image_url = $package_image_data['image'];

                                echo "<img src='../assets/img/{$package_image_url}' alt='Package Image' class='admin-panel-package-image'>";
                            }
                            echo "</td>";

                            // Calculate the total amount for the order
                            $order_items_sql = "SELECT SUM(price * quantity) AS total_amount FROM order_items WHERE order_id = '$order_id'";
                            $order_items_result = $conn->query($order_items_sql);
                            $order_items_data = $order_items_result->fetch_assoc();
                            $total_amount = $order_items_data['total_amount'];

                            echo "<td class='admin-panel-td'>{$total_amount}</td>";
                            echo "<td class='admin-panel-td'>
                                    <form method='post'>
                                        <input type='hidden' name='delete_order' value='{$order['id']}'>
                                        <button type='submit' onclick='return confirm(\"Are you sure you want to delete this order?\")'>Delete</button>
                                    </form>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6' class='admin-panel-td'>No orders found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>