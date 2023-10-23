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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" 0 href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Link general link -->
    <link rel="stylesheet" href="css/css_base/base.css">
    <link rel="stylesheet" href="css/css_base/grid.css">

    <!-- Link css apple store -->
    <!-- css header -->
    <link rel="stylesheet" href="css/header.css">

    <link rel="stylesheet" href="css/tgdd.css">
    <link rel="stylesheet" href="css/ShowRoom.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/sign-up.css">
    <link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="css/donhang.css">
</head>

<body>
    <!-- ------------------------ Apple Store ------------------------------- -->
    <main class="wrapper">
        <!-- ------------------------ Header ------------------------------- -->
        <header style="background-color: #f9f9f9;" class="header-main">
            <?php
            require "pages/header.php";
            ?>
        </header>

        <!-- ------------------------ Body ------------------------------- -->
        <section class="main_apple-store grid wide">
            <?php
            if (isset($_GET["url"])) {
                $p = $_GET["url"]; //pages/$p.".php"
                require "repository/" . $p . ".php";
            } else {
                require "pages/home.php";
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