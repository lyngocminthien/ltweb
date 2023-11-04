<section class="container">
    <div class="container_events">
        <div class="search_admin">
            <form action="" method="GET">
                <input type="hidden" name="" value="">
                <div class="search">
                    <input type="text" name="searchInput" id="searchInput" placeholder="applestore.com..." required>
                    <button type="submit">
                        <img style="width: 20px;" src="assets/Images/Icon/search-icon.svg" alt="search-icon">
                    </button>
                </div>
            </form>
        </div>

        <div class="add_account-admin">
            <a href="?page=signup">Cấp tài khoản</a>
        </div>

        <div class="sign-in_account-admin">
            <?php
            // Kiểm tra xem người dùng đã đăng nhập hay chưa
            if (isset($_SESSION['User'])) {
            ?>

                <form class="admin.php" method="POST">
                    <div class="">
                        <h1 class="">Xin chào admin <?php echo $_SESSION['User'] ?></h1>
                        <input class="" type="submit" name="thoat" value="Thoát">
                    </div>
                </form>

            <?php
            }
            // Kiểm tra xem người dùng đã nhấn nút đăng xuất hay chưa
            if (isset($_POST['thoat'])) {
                // Chuyển hướng người dùng đến trang đăng nhập hoặc trang khác
                header('Location: index.php');
            }
            ?>
        </div>
    </div>
</section>