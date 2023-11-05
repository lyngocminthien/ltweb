<section class="container">
    <div class="container_events">
        <div class="search_admin">
            <form method="GET">
                <!-- dùng hidden để đưa dữ liệu cùng với searchInput lên url để tìm kiếm -->
                <input type="hidden" name="page" value="search">
                <div class="search-input-admin">
                    <input type="text" name="searchInput" id="searchInput" placeholder="applestore.com..." required>
                    <button type="submit">
                        <img style="width: 29px;" src="assets/Images/Icon/search-icon.svg" alt="search-icon">
                    </button>
                </div>
            </form>
        </div>

        <div class="look_group">
            Xem
            <ul class="group-list h-175px">
                <li class="group-item">
                    <a href="?page=donhang" class="group-link">Xem đơn hàng</a>
                </li>
                <li class="group-item">
                    <a href="?page=ctdh" class="group-link">Xem chi tiết đơn hàng</a>
                </li>
                <li class="group-item">
                    <a href="?page=product" class="group-link">Xem sản phẩm</a>
                </li>
                <li class="group-item">
                    <a href="?page=loai" class="group-link">Xem loại</a>
                </li>
            </ul>
        </div>

        <div class="add_group">
            Thêm
            <ul class="group-list">
                <li class="group-item">
                    <a href="?page=add_product" class="group-link">Thêm sản phẩm</a>
                </li>
                <li class="group-item">
                    <a href="?page=add_loai" class="group-link">Thêm loại</a>
                </li>
            </ul>
        </div>

        <div class="update_group">
            Cập nhật
            <ul class="group-list">
                <li class="group-item">
                    <a href="?page=update_product" class="group-link">Cập nhật sản phẩm</a>
                </li>
                <li class="group-item">
                    <a href="?page=update_loai" class="group-link">Cập nhật loại</a>
                </li>
            </ul>
        </div>

        <div class="add_account-admin">
            <a href="?page=signup">Cấp tài khoản</a>
        </div>

        <div class="logout_account-admin">
            <?php
            // Kiểm tra xem người dùng đã đăng nhập hay chưa
            if (isset($_SESSION['User'])) {
            ?>

                <form class="admin.php" method="POST">
                    <div class="admin-here">
                        <span>
                            Xin chào admin
                            <span><?php echo $_SESSION['User'] ?></span>
                        </span>
                        <input type="submit" name="thoat" value="Thoát">
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