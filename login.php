<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/login.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <title>Login</title>
</head>
<?php
include './include/php/header.php';
?>

<body>
    <form action="./include/php/ulogin.php" method="POST">
        <div class="lbox">
            <div class="lcontainer">
                <div class="ltop">
                    <span>Have an account?</span>

                </div>

                <div class="linput-field">
                    <i class="bx bx-user"></i>
                    <input type="text" class="linput" placeholder="Email" name="email" id="name" required />

                </div>

                <div class="linput-field">
                    <i class="bx bx-lock-alt"></i>
                    <input type="Password" class="linput" placeholder="Password" id="password" name="password" required />

                </div>

                <div class="linput-field">
                    <input type="submit" class="lsubmit" name="submit" value="Login" id="" />
                </div>

                <div class="ltwo-col">
                    <div class="lone">
                        <input type="checkbox" name="remember" id="check" />
                        <label for="check"> Remember Me</label>
                    </div>
                    <div class="ltwo">
                        <label><a href="#">Forgot password?</a></label>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
