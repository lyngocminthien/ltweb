<?php
require "functions.php";
require "conn.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
    if (!isset($_SESSION["User"])) {
        header("location:index.php");
    } else if (isset($_SESSION["LoaiTK"]) && $_SESSION["LoaiTK"] != 1)
        header("location:index.php");


    if (isset($_POST['dangxuat'])) {
        header("Location:index.php");
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Apple Store</title>
        <link rel="stylesheet" href="css/admin/captaikhoan.css">
        <link rel="stylesheet" href="css/admin/login.css">
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
            <section class="main_admin">
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

<?php
}
?>