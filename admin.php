<?php
if (session_status() == PHP_SESSION_NONE)
session_start();
if (!isset($_SESSION["User"])) {
    header("location:index.php");
}
else if (isset($_SESSION["LoaiTK"]) && $_SESSION["LoaiTK"] != 1)
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
    <title>Admin</title>
    <link rel="stylesheet" href="../css/index.css">
</head>

<body>

<div>
    <form class="helu" method="POST">
        <div class="box_infoadmin">
            <h1 class="info_admin">Xin chào, <?php echo $_SESSION['User'] ?>.</h1>
            <input class="info_Admin_button" type="submit" name="dangxuat" value="Thoát">
        </div>
    </form>
</div>
</body>
</html>