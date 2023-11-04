<?php

if (isset($_POST['addtocard'])) {
    $TenSP = $_POST['TenSP'];
    $MaSP = $_POST['MaSP'];
    $Hinh = $_POST['Hinh'];
    $Gia = intval(str_replace('.', "", strval($_POST['Gia'])));
    $SoLuong = $_POST['SoLuong'];
    $re_LayGio = layGio($conn, $MaSP);
    $count = mysqli_num_rows($re_LayGio);
    // kiểm tra xem trong table giỏ hàng có sản phẩm đó chưa. Nếu có rồi thì tăng số lượng lên 1
    if ($count > 0) {
        $r = mysqli_fetch_array($re_LayGio);
        $SoLuong = $r['SoLuong'] + 1;
        $re_Updata = UpdataGio($conn, $SoLuong, $MaSP);
    } else {
        $SoLuong = $SoLuong;
        $re_Insert = NhapGio($conn, $TenSP, $MaSP, $Gia, $Hinh, $SoLuong);
    }
} elseif (isset($_POST['capnhatsoluong'])) {

    for ($i = 0; $i < count($_POST['MaSP']); $i++) {
        $MaSP = $_POST['MaSP'][$i];
        $SoLuong = $_POST['SoLuong'][$i];
        if ($SoLuong <= 0) {
            $re_Delete = XoaSP_Gio($conn, $MaSP);
        } else {
            $re_Updata  = UpdataGio($conn, $SoLuong, $MaSP);
        }
    }
} elseif (isset($_POST['delete_product'])) {
    $MaGioHang = $_POST['delete_product'];
    $re_Delete = XoaID_Gio($conn, $MaGioHang);
} elseif (isset($_POST['deletecard'])) {
    $re_Delete = XoaGio($conn);
} else if (isset($_POST['thanhtoan']) && isset($_SESSION['User'])) {
    $re_Delete = XoaGio($conn);
    // random mã đơn hàng có số trong khoảng (0<=x<=9999)
    $MaDH = rand(0, 9999);
    // biến session user tạo bên đăng nhập á gán cho biến $User để lưu thông tin khách hàng đã mua sản phẩm 
    $User = $_SESSION['User'];
    $TongSoLuong = $_POST['TongSoLuong'];
    $TongHD = $_POST['TongHD'];
    $TinhTrang = $_POST['TinhTrang'];
    $re_don = NhapDon($conn, $MaDH, $TongSoLuong, $User, $TinhTrang, $TongHD);

    // biến i sẽ chạy từ 0 đến tổng số mã sản phẩm hiện đang có (ví dụ có 3 sản phẩm thì sẽ có 3 mã sản phẩm != nhau)
    for ($i = 0; $i < count($_POST['MaSP']); $i++) {
        $MaSP = $_POST['MaSP'][$i];
        $SoLuong = $_POST['SoLuong'][$i];
        $Gia = $_POST['Gia'][$i];
        $TenSP = $_POST['TenSP'][$i];
        $Hinh = $_POST['Hinh'][$i];
        $re_ctdh = NhapChiTietDon($conn, $MaDH, $MaSP, $SoLuong, $TenSP, $Hinh, $Gia);
    }
} elseif (!isset($_SESSION['User'])) {
    echo '<script>document.querySelector(\'.js-modal\').style.display ="flex";
    const close1 = document.querySelector(\'.js-modal-close\');
        close1.addEventListener("click", function(){
            document.querySelector(\'.js-modal\').style.display ="none";
        });</script>';
}

// Hiện dữ liệu trong giỏ hàng
$re_lay_giohang = layHetGioHang($conn);
if (mysqli_num_rows($re_lay_giohang) != 0) {
?>

    <div class="container grid wide">
        <h3 class="heading-cart">Giỏ hàng của bạn</h3>
        <form method="POST" action="index.php?page=cart">
            <table class="cart-table" border="1">
                <thead>
                    <tr class="head-list-info">
                        <th class="head-item-info">
                            <span>Thứ tự</span>
                        </th>
                        <th class="head-item-info">
                            <span>Tên sản phẩm</span>
                        </th>
                        <th class="head-item-info">
                            <span>Hình</span>
                        </th>
                        <th class="head-item-info">
                            <span>Giá</span>
                        </th>
                        <th class="head-item-info">
                            <span>Số lượng</span>
                        </th>
                        <th class="head-item-info">
                            <span>Thành tiền</span>
                        </th>
                        <th class="head-item-info">
                            <span>Hành động</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="body-info-product">
                    <?php
                    $i = 0;
                    $total = 0;
                    $TongSoLuong = 0;
                    while ($row_giohang = mysqli_fetch_array($re_lay_giohang)) {
                        $tt = $row_giohang['Gia'] * $row_giohang['SoLuong'];
                        $TongSoLuong += $row_giohang['SoLuong'];
                        $total += $tt;
                        $i++;
                    ?>
                        <tr class="body-list-info">
                            <td class="body-item-stt"><?php echo $i ?></td>
                            <td class="body-item-name-product"><input type="hidden" name="TenSP[]" value="<?php echo $row_giohang['TenSP'] ?>"><?php echo $row_giohang['TenSP'] ?></td>
                            <td class="body-item-img"><input type="hidden" name="Hinh[]" value="<?php echo $row_giohang['Hinh'] ?>"><img class="product-img" src='assets/images/<?php echo $row_giohang['Hinh'] ?>'></td>
                            <td class="body-item-new-price">
                                <?php echo $row_giohang["Gia"] = number_format($row_giohang["Gia"], 0, ",", "."); ?><sup>đ</sup>
                            </td>

                            <td class="body-item-quantity">
                                <input type="hidden" name="MaSP[]" value="<?php echo $row_giohang['MaSP'] ?>">
                                <input type="hidden" name="Gia[]" value="<?php echo $tt; ?>">
                                <input type="number" min="0" name="SoLuong[]" value="<?php echo $row_giohang['SoLuong'] ?>">
                            </td>
                            <td class="body-item-into-money">
                                <?php echo number_format($tt, 0, ",", "."); ?><sup>đ</sup>
                            </td>
                            <td class="body-item-action">
                                <button type="submit" name='delete_product' value="<?php echo $row_giohang['MaGioHang'] ?>">
                                    <img src="assets/images/icon/delete-icon.svg" alt="delete-icon">
                                </button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                    <tr>
                        <td class="price-all-now">
                            <input type="hidden" name="TongHD" value="<?php echo $total; ?>">
                            <input type="hidden" name="TongSoLuong" value="<?php echo $TongSoLuong; ?>">
                            <input type="hidden" name="TinhTrang" value="<?php echo 'Đang xử lý'; ?>">
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="body-thong-bao">Tổng số tiền cho hóa đơn:
                <?php echo number_format($total, 0, ",", "."); ?><sup>đ</sup></div>
            <div class="option-cart">
                <button class="btn-cart" type="submit" name="capnhatsoluong">
                    <span>Cập nhật giỏ hàng</span>
                </button>
                <button class="btn-cart" type="submit" id="thanhtoan" name="thanhtoan">
                    <span>Đặt hàng</span>
                </button>
                <button class="btn-cart" type="submit" name='deletecard'>
                    <span>Xóa giỏ hàng</span>
                </button>
                <button class="btn-cart"><a href="index.php">Về trang chủ</a></button>
            </div>
        </form>

    </div>
<?php
} else {
    echo "<div class='container'><h3 class='heading-cart'>Giỏ hàng của bạn đang trống<h3></div>";
}

?>