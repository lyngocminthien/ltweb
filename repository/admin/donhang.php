<section class="container">
    <div class="container-donhang grid wide1">
        <h3 style="font-size: 35px;" class="heading-cart">Tất cả đơn hàng</h3>
        <form action="?page=donhang" method="post">
            <table class="table-ctdh cart-table" border="1">
                <thead class="table-head">
                    <tr class="row-head head-list-info">
                        <th class="col-head head-item-info">Mã ĐH</th>
                        <th class="col-head head-item-info">Tài khoản</th>
                        <th class="col-head head-item-info">Tổng số lượng</th>
                        <th class="col-head head-item-info">Tổng hóa đơn</th>
                        <th class="col-head head-item-info">Ngày Tạo</th>
                        <th class="col-head head-item-info">Yêu cầu hủy</th>
                        <th class="col-head head-item-info">Chấp thuận</th>
                        <th class="col-head head-item-info">Tình trạng</th>
                    </tr>
                </thead>
                <tbody class="table-body">
                    <?php
                    $result_donhang = layDonHang($conn);
                    while ($row = $result_donhang->fetch_assoc()) {
                    ?>
                        <tr class="body-list-info">
                            <td><?php echo $row['MaDH'] ?></td>
                            <td><?php echo $row['User'] ?></td>
                            <td><?php echo $row['TongSoLuong'] ?></td>
                            <td><?php echo number_format($row["TongHD"], 0, ",", "."); ?><sup>đ</sup></td>
                            <td><?php echo $row['NgayTao'] ?></td>
                            <td><?php echo $row['YeuCauHuy'] ?></td>
                            <td class="body-item-quantity">
                                <input type="hidden" name="MaDH[]" value="<?php echo $row['MaDH'] ?>">
                                <input type="number" min="0" name="ChapThuan[]" value="<?php echo $row['ChapThuan'] ?>">
                            </td>
                            <td><?php echo $row['TinhTrang'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>

            <!-- events button -->
            <div class="option-cart">
                <button class="btn-cart" type="submit" name="update_all">
                    <span>Cập nhật tất cả</span>
                </button>
                <button class="btn-cart" type="submit" name='delete_all'>
                    <span>Xóa tất cả</span>
                </button>
                <button class="btn-cart"><a href="admin.php">Về trang chủ</a></button>
            </div>
        </form>

        <?php
        if (isset($_POST["update_all"])) {
            for ($i = 0; $i < count($_POST["MaDH"]); $i++) {
                $MaDH = $_POST["MaDH"][$i];
                $ChapThuan = $_POST["ChapThuan"][$i];

                if ($ChapThuan > 3) {
                } else {
                    UpdateDH($conn, $MaDH, $ChapThuan);
                    echo "Cập nhật đơn hàng $MaDH thành công</br>";
                }
            }
        } else if (isset($_POST["delete_all"])) {
            XoaDH($conn);
            echo "Xóa tất cả đơn hàng thành công";
        }
        ?>

    </div>
</section>