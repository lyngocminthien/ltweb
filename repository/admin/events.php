<link rel="stylesheet" href="css/events.css">


<section class="container">
    <div class="container_events">
        <?php
        if (isset($_POST['logout'])) {
            if (isset($_GET["page"])) {
                $p = $_GET["page"];
                header("Location:admin.php?page=" . $p);
            } else {
                header("Location:admin.php");
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


        </div>


        <?php

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
                    <input type="submit" name="logout" value="Đăng xuất">
                </div>
            </div>
        </form>





        <a href="?page=login.php">Đăng nhập</a>


    </div>
</section>