<?php
if (isset($_SESSION['User'])) {
    $re = layThongTin($conn);
    $User = $_SESSION['User'];
    while ($r = mysqli_fetch_array($re)) {
        if ($User == $r['User']) {
            break;
        }
    }
    $re_layDonHang = layDonHang_User($conn, $User);
    if (mysqli_num_rows($re_layDonHang) != 0) {
?>
        <div class="container grid wide">
            <h3 class="heading-dh">Đơn hàng của <?php echo $r['HoTen']; ?></h3>
            <form method="post" action="index.php?page=ctdh">
                <table class="dh-table" border="1">
                    <thead>
                        <tr class="head-list-info">
                            <th class="head-item-info">
                                <span>Mã đơn</span>
                            </th>
                            <th class="head-item-info">
                                <span>Người đặt đơn</span>
                            </th>
                            <th class="head-item-info">
                                <span>Tổng số lượng sản phẩm</span>
                            </th>
                            <th class="head-item-info">
                                <span>Tổng Giá</span>
                            </th>
                            <th class="head-item-info">
                                <span>Ngày tạo đơn</span>
                            </th>
                            <th class="head-item-info">
                                <span>Trạng thái</span>
                            </th>
                            <th class="head-item-info">
                                <span>Hành động</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="body-info-product">
                        <?php
                        // vòng lặp duyệt qua từng dòng và in ra 
                        while ($r = mysqli_fetch_array($re_layDonHang)) {
                        ?>
                            <tr class="body-list-info">
                                <td><?php echo $r['MaDH'] ?></td>
                                <td><?php echo $r['User'] ?></td>
                                <td><?php echo $r['TongSoLuong'] ?></td>
                                <td><?php echo $r['TongHD'] = number_format($r["TongHD"], 0, ",", "."); ?><sup>đ</sup></td>
                                <td><?php echo $r['NgayTao'] ?></td>
                                <td><?php echo $r['TinhTrang'] ?></td>
                                <td>
                                    <button class="btn-cthd" type="submit" name='XemChiTiet' value="<?php echo $r['MaDH'] ?>">
                                        <img src="assets/images/icon/see-icon.svg" alt="information_seeing">
                                    </button>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>

                <?php
                if (isset($_POST['XemChiTiet'])) {
                    $MaDH = $_POST['XemChiTiet'];

                    $re = layDonHang_MaDH($conn, $MaDH);
                    $r = mysqli_fetch_array($re);

                    // Admin sẽ xử lí việc chấp thuận
                    if ($r['ChapThuan'] == 1) {
                        $sql = mysqli_query($conn, "UPDATE donhang SET TinhTrang='Đã hủy' WHERE MaDH='$MaDH'");
                        $sql = mysqli_query($conn, "UPDATE donhang SET YeuCauHuy='0' WHERE MaDH='$MaDH'");
                        echo 'Đã hủy đơn ' . $MaDH . ' thành công';
                    } elseif ($r['ChapThuan'] == 2) {
                        $sql = mysqli_query($conn, "UPDATE donhang SET TinhTrang='Đang giao hàng' WHERE MaDH='$MaDH'");
                        echo 'Đơn hàng ' . $MaDH . ' đang được giao tới bạn...';
                    } elseif ($r['ChapThuan'] == 3) {
                        $sql = mysqli_query($conn, "UPDATE donhang SET TinhTrang='Không thành công' WHERE MaDH='$MaDH'");
                        echo 'Có thể kiện hàng của bạn đang gặp sự cố. Liên hệ cộng tác viên để được phản hồi';
                    } elseif ($r['YeuCauHuy'] == 1) {
                        $sql = mysqli_query($conn, "UPDATE donhang SET TinhTrang='Yêu cầu hủy đơn' WHERE MaDH='$MaDH'");
                        echo 'Đang chờ hủy đơn...';
                    }
                ?>
                    <table class="dh-table" border="1">
                        <thead>
                            <tr class="head-list-info">
                                <th class="head-item-info">
                                    <span>Mã sản phẩm</span>
                                </th>
                                <th class="head-item-info">
                                    <span>Tên sản phẩm</span>
                                </th>
                                <th class="head-item-info">
                                    <span>Số lượng</span>
                                </th>
                                <th class="head-item-info">
                                    <span>Hình</span>
                                </th>
                                <th class="head-item-info">
                                    <span>Ngày đặt đơn</span>
                                </th>
                                <th class="head-item-info">
                                    <span>Tổng giá sản phẩm</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="body-info-product">
                            <?php
                            $re = layCTDH_MaDH($conn, $MaDH);
                            while ($r = mysqli_fetch_array($re)) {
                            ?>
                                <tr class="body-list-info">
                                    <td><?php echo $r['MaSP'] ?></td>
                                    <td class="body-item-name-product"><?php echo $r['TenSP'] ?></td>
                                    <td><?php echo $r['SoLuong'] ?></td>
                                    <td class="body-item-img"><img class="product-img" src='assets/images/<?php echo $r['Hinh'] ?>'>
                                    </td>
                                    <td><?php echo $r['NgayDatDon'] ?></td>
                                    <td><?php echo $r['Gia'] = number_format($r["Gia"], 0, ",", "."); ?><sup>đ</sup></td>
                                </tr>
                            <?php
                            }
                            $MaDH = $_POST['XemChiTiet'];
                            $re = layDonHang_MaDH($conn, $MaDH);
                            $r = mysqli_fetch_array($re);
                            // Nếu đang trong tình trạng đang xử lý nghĩa là đã đặt hàng rồi và chỉ có nút hủy đơn được hoạt động
                            if ($r['TinhTrang'] == "Đang xử lý") {
                            ?>
                                <div class="body-list-info">
                                    <button class="btn-cart" type="submit" id="btnHuyDon" name='HuyDon' value="<?php echo $r['MaDH'] ?>">Hủy đơn hàng</button>
                                    <button class="btn-cart-errol" type="button" id="btnDatLai" disabled>Đặt lại</button>
                                </div>

                            <?php
                            }
                            // Nếu "Đang giao hàng" thì sẽ không có nút nào hoạt động
                            else if ($r['TinhTrang'] == "Đang giao hàng") {
                            ?>
                                <div class="body-list-info">
                                    <button class="btn-cart-errol" type="button" id="btnHuyDon" disabled>Hủy đơn hàng</button>
                                    <button class="btn-cart-errol" type="submit" id="btnDatLai" disabled>Đặt lại</button>
                                </div>
                            <?php
                            }
                            // Ngược lại thì chỉ có nút đặt lại hoạt động (là có thể bấm được)  
                            else {
                            ?>
                                <div class="body-list-info">
                                    <button class="btn-cart-errol" type="button" id="btnHuyDon" disabled>Hủy đơn hàng</button>
                                    <button class="btn-cart" type="submit" id="btnDatLai" name='DatLai' value="<?php echo $r['MaDH'] ?>">Đặt lại</button>
                                </div>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                <?php
                }

                if (isset($_POST['HuyDon'])) {
                    $MaDH = $_POST['HuyDon'];
                    echo 'Đang chờ hủy đơn hàng...';
                    $sql = mysqli_query($conn, "UPDATE donhang SET YeuCauHuy='1' WHERE MaDH='$MaDH'");
                }

                if (isset($_POST['DatLai'])) {
                    $MaDH = $_POST['DatLai'];
                    echo 'Đã đặt lại đơn hàng...';
                    $sql = mysqli_query($conn, "UPDATE donhang SET YeuCauHuy='0' WHERE MaDH='$MaDH'");
                    $sql = mysqli_query($conn, "UPDATE donhang SET ChapThuan='0' WHERE MaDH='$MaDH'");
                    $sql = mysqli_query($conn, "UPDATE donhang SET TinhTrang='Đang xử lý' WHERE MaDH='$MaDH'");
                }

                // echo '<script>document.getElementById(\'btnHuyDon\').style.display = \'none\';</script>';
                // echo '<script> document.getElementById(\'btnDatDon\').style.display = \'none\';</script>';  

                ?>
                </from>

            <?php
        } else {
            echo "<div class='container'><h3 class='heading-cart'>Bạn không có đơn hàng nào<h3></div>";
        }
    } else {

            ?>
            <div class='container'>
                <h3 class='heading-cart'>Bạn cần phải đăng nhập.<h3>
            </div>
            <div class="body-list-info">
                <div class="option-cart">
                    <button class="btn-cart"><a href="index.php">Về trang chủ</a></button>
                </div>
            </div>
        </div>
    <?php
    }
    ?>