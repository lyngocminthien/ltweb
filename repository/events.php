<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();

    if (isset($_POST['logout'])) {
        unset($_SESSION['User']);
        if (isset($_GET["page"])) {
            $p = $_GET["page"]; //pages/$p.".php"
            if ($p == "showroom") {
                $MaSP = $_GET["MaSP"]; // lấy biến MaSP từ page
                header("Location:index.php?page=" . $p . "&MaSP=" . $MaSP);
            } else {
                header("Location:index.php?page=" . $p);
            }
        }
    }
?>

<div class="nav-top_search">
    <form action="index.php" method="GET">
        <input type="hidden" name="page" value="search">
        <div class="search">
            <input type="text" name="input-search" id="input-search" placeholder="Tìm kiếm trên applestore.com"
                required>
            <button type="submit">
                <img src="assets/Images/Icon/search-icon.svg" alt="search-icon">
            </button>
        </div>
    </form>

    <a href="index.php?page=cart" class="cart">
        <img src="assets/Images/Icon/cart-icon.svg" alt="cart-icon">
        <span>Giỏ hàng</span>
    </a>

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
                <form method="post">
                    <div id="update_form">
                        <div class="account">
                            <label for="account_apple">Account:</label>
                            <input type="text" id="account_apple" name="account_apple" placeholder="applestore.com">
                        </div>

                        <div class="password">
                            <label for="password_apple">Password:</label>
                            <input type="password" id="password_apple" name="password_apple"
                                placeholder="applestore.com">
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
                                        $_SESSION['sign-in_submit'] = $taikhoan;
                                        if (isset($_GET["page"])) {
                                            $p = $_GET["page"]; //pages/$p.".php"
                                            if ($p == "showroom") {
                                                $MaSP = $_GET["MaSP"]; // Lấy biến MaSP từ page
                                                header("Location:index.php?page=" . $p . "&MaSP=" . $MaSP);
                                            } else {
                                                header("Location:index.php?page=" . $p);
                                            }
                                        }
                                    } elseif ($r['LoaiTK'] == 1) {
                                        $_SESSION['sign-in_submit'] = $taikhoan;
                                        echo "<script>window.location.href='admin.php';</script>";
                                    }
                                } else {
                                    echo "<div style='font-size: 17px;
                                color: var(--notification);
                                font-weight: 600;' 
                                class='ThongBao'>
                                Tài khoản hoặc mật khẩu không hợp lệ
                                </div>";
                                    echo '<script>
        document.querySelector(\'.js-modal\').style.display = "flex";
        const close1 = document.querySelector(\'.js-modal-close\');
        close1.addEventListener("click", function(){
            document.querySelector(\'.js-modal\').style.display ="none";
        });</script>';
                                }
                            }

                            ?>

                        <a href="index.php?page=signup" class="sign-up">Bạn chưa có tài khoản?</a>

                        <div class="signup_submit">
                            <input type="submit" name="sign-in_submit" value="Đăng nhập">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
    <form method="POST">
        <div class="account_login">
            <div class="account_img">
                <img src="assets/images/icon/account-icon.svg" alt="account_login">
                <span><?php echo $r['HoTen']; ?></span>
            </div>
            <div class="cart_log-out">
                <a href="index.php?page=ctdh">Đơn hàng của bạn</a>
                <input type="submit" name="logout" value="Đăng xuất">
            </div>
        </div>
    </form>
    <?php
        } else {
        ?>

    <button type="submit" class="btnAccount">
        <img src="assets/Images/Icon/account-icon.svg" alt="account-icon">
        <span>Đăng nhập</span>
    </button>

    <?php
        }
        ?>
</div>
<?php
}
?>
<script src="js/modal.js"></script>