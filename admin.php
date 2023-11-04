<?php
session_start();
ob_start();

if (!isset($_SESSION["User"])) {
    header("location: index.php");
    exit;
}

if (isset($_SESSION["LoaiTK"]) && $_SESSION["LoaiTK"] != 1) {
    header("location: index.php");
    exit;
}

require "functions.php";
require "conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Apple Store</title>

    <!-- Link logo title-->
    <link rel="icon" type="image/x-icon" href="assets/images/icon/logo_web.svg">

    <!-- Link fonts && icon -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/admin/dashboard.css">
    <link rel="stylesheet" href="css/admin/signup.css">
    <link rel="stylesheet" href="css/admin/header.css">
    <link rel="stylesheet" href="css/admin/events.css">
</head>

<body>
    <!-- ------------------------ Apple Store ------------------------------- -->
    <main class="wrapper">
        <!-- ------------------------ Header ------------------------------- -->
        <header class="header_admin">
            <?php
            require "pages/admin/header.php";
            require "repository/admin/events.php";
            ?>
        </header>

        <!-- ------------------------ Body ------------------------------- -->
        <section class="main_admin" style="margin-bottom: 20px">
            <?php
            $path = "repository/admin/";
            if (isset($_GET["page"])) {
                $p = $_GET["page"];
                require $path . $p . ".php";
            } else {
                require $path . "dashboard.php";
            }
            ?>
        </section>
    </main>
</body>

</html>