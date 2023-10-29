<?php
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
    </main>
</body>

</html>