<header class="header">
    <nav class="navigation">
        <section class="nav-content">
            <div class="nav-top">
                <img src="Image/Icon/logo_web.svg" alt="logo-header" class="logo_apple-store">
                <div class="nav-top_search">
                    <form action="index.php" method="post">
                        <input type="text" name="input-search" id="input-search"
                            placeholder="Tìm kiếm trên applestore.com">
                        <button type="submit" name="submit-search" style="display: none;"></button>
                    </form>
                    <a href=""><img src="Image/Icon/cart-icon.svg" alt="cart-icon"></a>
                    <button class="btnAccount">
                        <img src="Image/Icon/account-icon.svg" alt="account-icon">
                    </button>
                </div>
            </div>
            <div class="nav-bottom">
                <ul class="nav-list">
                    <li class="nav-item">
                        <img src="Image/Icon/iphone-icon.svg" alt="iphone-icon">
                        <a href="" class="nav-item-link">IPhone</a>

                        <!-- ----------------- Sub nav ---------------------- -->
                        <div class="sub-nav">
                            <span class="sub-nav_heading">
                                Mua IPhone
                            </span>
                            <ul class="sub-nav-list">
                                <li class="sub-nav-item">
                                    <?php
                                    $result = laySP($conn, 1);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<a href='' class='sub-nav-item_link'>$row[TenSP]</a>";
                                        }
                                    }
                                    ?>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <img src="Image/Icon/mac-icon.svg" alt="iphone-icon">
                        <a href="" class="nav-item-link">Mac</a>

                        <!-- ----------------- Sub nav ---------------------- -->
                        <div class="sub-nav">
                            <span class="sub-nav_heading">
                                Mua Mac
                            </span>
                            <ul class="sub-nav-list">
                                <li class="sub-nav-item">
                                    <?php
                                    $result = laySP($conn, 2);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<a href='' class='sub-nav-item_link'>$row[TenSP]</a>";
                                        }
                                    }
                                    ?>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <img src="Image/Icon/ipad-icon.svg" alt="iphone-icon">
                        <a href="" class="nav-item-link">IPad</a>

                        <!-- ----------------- Sub nav ---------------------- -->
                        <div class="sub-nav">
                            <span class="sub-nav_heading">
                                Mua IPad
                            </span>
                            <ul class="sub-nav-list">
                                <li class="sub-nav-item">
                                    <?php
                                    $result = laySP($conn, 3);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<a href='' class='sub-nav-item_link'>$row[TenSP]</a>";
                                        }
                                    }
                                    ?>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <img src="Image/Icon/iwatch-icon.svg" alt="iphone-icon">
                        <a href="" class="nav-item-link">Watch</a>

                        <!-- ----------------- Sub nav ---------------------- -->
                        <div class="sub-nav">
                            <span class="sub-nav_heading">
                                Mua Watch
                            </span>
                            <ul class="sub-nav-list">
                                <li class="sub-nav-item">
                                    <?php
                                    $result = laySP($conn, 4);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<a href='' class='sub-nav-item_link'>$row[TenSP]</a>";
                                        }
                                    }
                                    ?>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <img src="Image/Icon/airpod-icon.svg" alt="iphone-icon">
                        <a href="" class="nav-item-link">AirPods</a>

                        <!-- ----------------- Sub nav ---------------------- -->
                        <div class="sub-nav">
                            <span class="sub-nav_heading">
                                Mua Airpods
                            </span>
                            <ul class="sub-nav-list">
                                <li class="sub-nav-item">
                                    <?php
                                    $result = laySP($conn, 5);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<a href='' class='sub-nav-item_link'>$row[TenSP]</a>";
                                        }
                                    }
                                    ?>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
    </nav>
</header>