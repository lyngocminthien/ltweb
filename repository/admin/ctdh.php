<section class="container">
    <div class="container-ctdh grid wide1">
        <h3 style="font-size: 35px;" class="heading-cart">Chi tiết tất cả đơn hàng</h3>
        <form action="?page=ctdh" method="post">
            <table class="table-ctdh cart-table" border="1">
                <thead class="table-head">
                    <tr class="row-head head-list-info">
                        <th class="col-head head-item-info">Mã CTĐH</th>
                        <th class="col-head head-item-info">Mã ĐH</th>
                        <th class="col-head head-item-info">Mã SP</th>
                        <th class="col-head head-item-info">Số lượng</th>
                        <th class="col-head head-item-info">Tên SP</th>
                        <th class="col-head head-item-info">Hình</th>
                        <th class="col-head head-item-info">Ngày đặt đơn</th>
                        <th class="col-head head-item-info">Giá</th>
                    </tr>
                </thead>
                <tbody class="table-body">
                    <?php
                    $result_ctdh = layCTDH($conn);
                    while ($row = $result_ctdh->fetch_assoc()) {
                    ?>
                        <tr class="body-list-info">
                            <td><?php echo $row['MaCTDH'] ?></td>
                            <td><?php echo $row['MaDH'] ?></td>
                            <td><?php echo $row['MaSP'] ?></td>
                            <td><?php echo $row['SoLuong'] ?></td>
                            <td class="body-item-name-product"><?php echo $row['TenSP'] ?></td>
                            <td class="body-item-img">
                                <img class="product-img" src='assets/images/<?php echo $row['Hinh'] ?>'>
                            </td>
                            <td><?php echo $row['NgayDatDon'] ?></td>
                            <td><?php echo $row['Gia'] = number_format($row["Gia"], 0, ",", "."); ?><sup>đ</sup></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>

            <!-- events button -->
            <div class="option-cart">
                <button class="btn-cart" type="submit" name='delete_all'>
                    <span>Xóa tất cả</span>
                </button>
                <button class="btn-cart"><a href="admin.php">Về trang chủ</a></button>
            </div>
        </form>

        <?php
        if (isset($_POST["delete_all"])) {
            XoaCTDH($conn);
            echo "Xóa tất cả chi tiết đơn hàng thành công";
        }
        ?>

    </div>
</section>