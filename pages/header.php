<header class="header">
    <nav class="navigation">
        <section class="nav-content">
            <div class="nav-top">
                <a class="heading-logo-link" href="index.php">
                    <img src="assets/Images/Icon/logo_web.svg" alt="logo-header" class="logo_apple-store">
                </a>

                <div class="nav-top_search">
                    <form action="index.php" method="GET">
                        <input type="hidden" name="page" value="search.php">
                        <div class="search">
                            <input type="text" name="input-search" id="input-search" placeholder="Tìm kiếm trên applestore.com">
                            <button type="submit">
                                <img src="assets/Images/Icon/search-icon.svg" alt="search-icon">
                            </button>
                        </div>
                    </form>

                    <a href="index.php?page=cart.php" class="cart">
                        <img src="assets/Images/Icon/cart-icon.svg" alt="cart-icon">
                        <span>Giỏ hàng</span>
                    </a>

                    <button type="submit" class="btnAccount">
                        <img src="assets/Images/Icon/account-icon.svg" alt="account-icon">
                        <span>Đăng nhập</span>
                    </button>
                </div>
            </div>

            <div class="nav-bottom">
                <ul class="nav-list">
                    <?php
                    $result = layLoai($conn);
                    $row = $result->fetch_assoc();
                    ?>
                    <li class="nav-item">
                        <img src="assets/Images/Icon/iphone-icon.svg" alt="iphone-icon">
                        <a href="index.php?page=iphone.php" class="nav-item-link">IPhone</a>
                    </li>

                    <li class="nav-item">
                        <img src="assets/Images/Icon/mac-icon.svg" alt="iphone-icon">
                        <a href="index.php?page=mac.php" class="nav-item-link">Mac</a>
                    </li>

                    <li class="nav-item">
                        <img src="assets/Images/Icon/ipad-icon.svg" alt="iphone-icon">
                        <a href="index.php?page=ipad.php" class="nav-item-link">IPad</a>
                    </li>

                    <li class="nav-item">
                        <img src="assets/Images/Icon/iwatch-icon.svg" alt="iphone-icon">
                        <a href="index.php?page=iwatch.php" class="nav-item-link">Watch</a>
                    </li>
                    <li class="nav-item">
                        <img src="assets/Images/Icon/airpod-icon.svg" alt="iphone-icon">
                        <a href="index.php?page=airpod.php" class="nav-item-link">AirPods</a>
                    </li>
                </ul>
            </div>
        </section>
    </nav>
</header>