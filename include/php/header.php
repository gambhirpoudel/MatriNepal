<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../../assets/css/style.css">

    <div class="info">
        <span> <i class="fa fa-phone"></i> 977777</span>
        <span> <i class="fa fa-envelope"></i> info@example.com</span>
    </div>
    <nav>
        <div class="logo">
            <i class="fa fa-gift"></i> Matri<strong>Nepal</strong>
        </div>
        <div class="menu">
            <a href="
        <?php
        if (isset($_SESSION['name'])) {
            echo "./index2.php";
        } else {
            echo "./index.php";
        }
        ?>
        ">Home</a>
            <a href=" <?php
                        if (isset($_SESSION['name'])) {
                            echo "match.php";
                        } else {
                            echo "packages.php";
                        }
                        ?>">

                <?php
                if (isset($_SESSION['name'])) {
                    echo "Find Match";
                } else {
                    echo "Packages";
                }
                ?></a>


            <a href=" <?php
                        if (isset($_SESSION['name'])) {
                            echo "packages.php";
                        } else {
                            echo "contact.php";
                        }
                        ?>">

                <?php
                if (isset($_SESSION['name'])) {
                    echo "Packages";
                } else {
                    echo "Contact Us";
                }
                ?></a>
            <?php
            if (isset($_SESSION['name'])) {
                echo '<a href="cart.php">
           <i class="fa-solid fa-cart-shopping"></i>
         </a>';
            }
            ?>
            <?php
            if (isset($_SESSION['name'])) {
                echo '<a href="./sesdestory.php" target="_self">Logout</a>';
            } else {
                echo '<a href="./login.php">Login</a>';
            }
            ?>


        </div>
    </nav>