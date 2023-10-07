<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Admin Panel</title>
</head>

<body>
    <div class="admin-panel">
        <aside class="sidebar">
            <div class="logo">
                <i class="fa fa-gift"></i><span>Matri</span> <strong>Nepal</strong>
                <p style="color: white;">Welcome <?php echo $_SESSION['aname']; ?></p>
            </div>
            <br>
            <ul>
                <li><a href="./index.php">Dashboard</a></li>
                <li><a href="./user.php">Users</a></li>
                <li><a href="./packages.php">Packages</a></li>
                <li><a href="./orders.php">Orders</a></li>
                <li><a href="./sesdestroy.php">Logout</a></li>
            </ul>
        </aside>

    </div>
</body>

</html>