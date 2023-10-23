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
    <link rel="icon" type="image/x-icon" href="Image/Icon/logo_web.svg">

    <!-- Link fonts && icon -->
    <link rel="stylesheet" 0 href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Link general link -->

    <!-- Link css apple store -->
    <link rel="stylesheet" href="Css/tgdd.css">
    <link rel="stylesheet" href="Css/ShowRoom.css">
    <link rel="stylesheet" href="Css/footer.css">
    <link rel="stylesheet" href="Css/product.css">
    <link rel="stylesheet" href="Css/sign-up.css">
    <link rel="stylesheet" href="Css/cart.css">
    <link rel="stylesheet" href="Css/donhang.css">
</head>

<body>
    <!-- ------------------------ Apple Store ------------------------------- -->
    <main class="wrapper">
        <!-- ------------------------ Header ------------------------------- -->
        <header class="header-main">
            <?php
            require "pages/header.php";
            ?>
        </header>

        <!-- ------------------------ Body ------------------------------- -->
        <section class="main_apple-store">
            <?php
            if (isset($_GET["url"])) {
                $p = $_GET["url"]; //pages/$p.".php"
                require "repository/" . $p . ".php";
            } else {
                require "repository/home.php";
            }
            ?>
        </section>


        <!-- ------------------------ Footer ------------------------------- -->
        <footer class="footer-main">
            <?php
            require "pages/footer.php";
            ?>
        </footer>
    </main>
</body>

</html>