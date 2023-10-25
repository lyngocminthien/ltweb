<?php
if (session_status() == PHP_SESSION_NONE)
    session_start();


if (isset($_POST['logout'])) {
    unset($_SESSION['User']);
    if (isset($_GET["url"])) {
        $p = $_GET["url"]; //pages/$p.".php"
        $p = $_GET["url"]; //pages/$p.".php"
        if ($p == "ShowRoom") {
            $id = $_GET["id"]; // lấy biến id từ url
            header("Location:index.php?url=" . $p . "&id=" . $id);
        } else {
            header("Location:index.php?url=" . $p);
        }
    }
}
?>

<div class="container">
    <ul>
        <form class="search" action="index.php" method="GET">
            <li>
                <input type="hidden" name="url" value="search">
                <div>
                    <input type="text" name="Key" placeholder="Tìm kiếm..." required>
                    <button class="fa-solid fa-magnifying-glass" type="submit"></button>
                </div>
            </li>
        </form>
        <li><a href="index.php?url=giohang"><button><i class="fa-solid fa-cart-shopping"></i> Giỏ hàng</button></a></li>

        <div class="login">
            <div class="login-content">
                <h2>Vui lòng đăng nhập <span><button id="close1">X</button></span></h2>
                <div class="form">
                    <form method="post">
                        <div class="user">
                            <label for="user">Tên tài khoản: </label>
                            <input type="text" id="user" name="username">
                        </div>
                        <div class="pass">
                            <label for="pass">Mật khẩu: </label>
                            <input type="password" id="pass" name="password">
                        </div>


                        <?php
                        if (isset($_POST['login'])) {
                            $taikhoan = $_POST['username'];
                            $matkhau = ($_POST['password']);
                            $re = logIn($conn, $taikhoan, $matkhau);
                            if (mysqli_num_rows($re) > 0) {
                                $r = mysqli_fetch_array($re);
                                $_SESSION["User"] = $r["User"];
                                $_SESSION["LoaiTK"] = $r["LoaiTK"];
                                if ($r['LoaiTK'] == 0) {
                                    $_SESSION['login'] = $taikhoan;
                                    if (isset($_GET["url"])) {
                                        $p = $_GET["url"]; //pages/$p.".php"
                                        if ($p == "ShowRoom") {
                                            $id = $_GET["id"]; // lấy biến id từ url
                                            header("Location:index.php?url=" . $p . "&id=" . $id);
                                        } else {
                                            header("Location:index.php?url=" . $p);
                                        }
                                    }
                                } else if ($r['LoaiTK'] == 1) {
                                    $_SESSION['login'] = $taikhoan;
                                    header("Location:../NCStore/admin.php");
                                }
                            } else {
                                echo "<div class='ThongBao'>Tài khoản hoặc mật khẩu không hợp lệ vui lòng thử lại :((</div>";
                                echo '<script>
                            document.querySelector(\'.login\').style.display = "flex";
                            </script>';
                            }
                        }

                        ?>
                        <a href="index.php?url=SignUp">
                            <div>Bạn chưa có tài khoản?</div>
                        </a>
                        <div class="sub">
                            <input type="submit" id="sub" name="login" value="Đăng nhập">
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
            <li>
                <form class="hello" method="POST">
                    <div>
                        Xin chào, <?php echo $r['HoTen']; ?> <i class="fa-sharp fa-solid fa-caret-down"></i>
                    </div>
                    <div>
                        <div class="child_event">
                            <ul>
                                <li> <a href="index.php?url=ctdh">Đơn hàng của bạn</a></li>
                                <li><input style="cursor: pointer;" type="submit" name="logout" value="Đăng xuất"></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </li>
        <?php
        } else {
        ?>
            <li style="cursor: pointer;" id="login">Đăng Nhập</li>
        <?php
            echo '<script>const logintbtn = document.querySelector(\'#login\');
    logintbtn.addEventListener("click", function(){
        document.querySelector(\'.login\').style.display ="flex";
    });
    const close1 = document.querySelector(\'#close1\');
    close1.addEventListener("click", function(){
        document.querySelector(\'.login\').style.display ="none";
    });</script>';
        }
        ?>


    </ul>
</div>