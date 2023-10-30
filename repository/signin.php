<?php

if (isset($_POST['logout'])) {
    unset($_SESSION['User']);
    if (isset($_GET["page"])) {
        $p = $_GET["page"]; //pages/$p.".php"
        if ($p == "showroom.php") {
            $MaSP = $_GET["MaSP"]; // lấy biến id từ url
            header("Location:index.php?page=" . $p  . "&MaSP=" . $MaSP);
        } else {
            header("Location:index.php?page=" . $p);
        }
    }
}
?>

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
                        <label for="password_apple">Password:</label>
                        <input type="password" id="password_apple" name="password_apple" placeholder="applestore.com">
                    </div>

                    <a href="index.php?page=signup.php" class="sign-up">Bạn chưa có tài khoản?</a>

                    <div class="signup_submit">
                        <input type="submit" name="sign-in_submit" value="Đăng nhập">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['sign-in_submit'])) {
    $taikhoan = $_POST['account_apple'];
    $matkhau = ($_POST['password_apple']);
    $re = logIn($conn, $taikhoan, $matkhau);
    if (mysqli_num_rows($re) > 0) {
        $r = mysqli_fetch_array($re);
        $_SESSION["User"] = $r["User"];
        $_SESSION["LoaiTK"] = $r["LoaiTK"];
        if ($r['LoaiTK'] == 0) {
            $_SESSION['login'] = $taikhoan;
            if (isset($_GET["page"])) {
                $p = $_GET["page"]; //pages/$p.".php"
                if ($p == "showroom.php") {
                    $MaSP = $_GET["MaSP"]; // lấy biến id từ url
                    header("Location:index.php?page=" . $p . "&MaSP=" . $MaSP);
                } else {
                    header("Location:index.php?page=" . $p);
                }
            }
        } else if ($r['LoaiTK'] == 1) {
            $_SESSION['login'] = $taikhoan;
            header("Location:AppleStore/admin.php");
        }
    } else {
        echo "<div class='ThongBao'>Tài khoản hoặc mật khẩu không hợp lệ vui lòng thử lại</div>";
        echo '<script>
        document.querySelector(\'.js-modal\').style.display = "flex";
        </script>';
    }
}
?>

<?php
if (isset($_SESSION['User'])) {
    $re = layThongTin($conn);
    $User = $_SESSION['User'];
    while ($r = mysqli_fetch_array($re)) {
        if ($User == $r['User']) {
            break;
        }
    }


?>
<form class="hello" method="POST">
    <div>
        Xin chào, <?php echo $r['HoTen']; ?>
    </div>
    <div>
        <div class="child_event">
            <ul>
                <li> <a href="index.php?page=ctdh.php">Đơn hàng của bạn</a></li>
                <li><input style="cursor: pointer;" type="submit" name="logout" value="Đăng xuất"></li>
            </ul>
        </div>
    </div>
</form>
<?php
}
?>

<script src="js/modal.js"></script>