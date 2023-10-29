<?php
session_start();

require "functions.php";
require "conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apple Store</title>

    <!-- Link logo title-->
    <link rel="icon" type="image/x-icon" href="assets/images/icon/logo_web.svg">

    <!-- Link fonts && icon -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet" />

    <!-- Link general link -->
    <link rel="stylesheet" href="css/base.css">

    <!-- css header && footer -->
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">

    <!-- Link css apple store -->
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/showroom.css">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/sign_up.css">
    <link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="css/donhang.css">
    <link rel="stylesheet" href="css/modal.css">
</head>

<body>
    <!-- ------------------------ Apple Store ------------------------------- -->
    <main class="wrapper">
        <!-- ------------------------ Header ------------------------------- -->

        <?php
        require "pages/header.php";
        ?>

        <!-- ------------------------ Body ------------------------------- -->
        <section class="main_apple-store">
            <?php
            if (isset($_GET["page"])) {
                $p = $_GET["page"]; //pages/$p.".php"
                require "repository/$p";
            } else {
                require "repository/dashboard.php";
            }
            ?>
        </section>


        <!-- ------------------------ Footer ------------------------------- -->
        <footer class="footer-main grid wide">
            <?php
            require "pages/footer.php";
            ?>
        </footer>

        <!-- ------------------------ Modal ------------------------------- -->
        <div class="modal js-modal">
            <div class="modal-container js-modal-container">
                <!-- header -->
                <header class="modal-header">
                    <div class="modal-header-content">
                        Đăng nhập vào Apple Store
                        <img src="assets/images/icon/apple-white.svg" alt="logo-form">
                    </div>
                    <!-- icon close -->
                    <div class="close-container">
                        <div class="modal-close js-modal-close">
                            <img src="assets/images/icon/close-icon.svg" alt="close-modal">
                        </div>
                    </div>
                </header>

                <div class="modal-body">
                    <form action="index.php" method="post">
                        <div id="update_form">
                            <div class="account">
                                <label for="account_apple">Account:</label>
                                <input type="text" id="account_apple" name="account_apple" placeholder="applestore.com">
                            </div>

                            <div class="password">
                                <label for="name_apple">Password:</label>
                                <input type="password" id="name_apple" name="name_apple" placeholder="applestore.com">
                            </div>

                            <a href="index.php?page=signup.php" class="sign-up">Bạn chưa có tài khoản?</a>

                            <div class="signup_submit">
                                <input type="submit" name="add_submit" value="Đăng nhập">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="js/modal.js"></script>
    </main>
</body>

</html>