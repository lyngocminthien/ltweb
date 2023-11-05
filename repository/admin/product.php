<section class="container">
    <div class="container-product grid wide1">
        <h3 style="font-size: 35px;" class="heading-cart">Tất cả sản phẩm trên Apple Store</h3>
        <form action="?page=product" method="post">
            <table class="table-product cart-table" border="1">
                <thead class="table-head">
                    <tr class="row-head head-list-info">
                        <th class="col-head head-item-info">Mã SP</th>
                        <th class="col-head head-item-info">Tên SP</th>
                        <th class="col-head head-item-info">Mô tả</th>
                        <th class="col-head head-item-info">Hình</th>
                        <th class="col-head head-item-info">Nội dung</th>
                        <th class="col-head head-item-info">Ngày tạo</th>
                        <th class="col-head head-item-info">Giá</th>
                        <th class="col-head head-item-info">Mã Loại</th>
                        <th class="col-head head-item-info">Cập nhật</th>
                        <th class="col-head head-item-info">Xóa</th>
                    </tr>
                </thead>
                <tbody class="table-body">
                    <?php
                    $result_sanpham = laySanPham($conn);
                    while ($row = $result_sanpham->fetch_assoc()) {
                    ?>
                        <tr class="body-list-info">
                            <td><?php echo $row['MaSP'] ?></td>
                            <td><?php echo $row['TenSP'] ?></td>
                            <td><?php echo $row['MoTa'] ?></td>
                            <td class="body-item-img">
                                <img class="product-img" src='assets/images/<?php echo $row['Hinh'] ?>'>
                            </td>
                            <td>
                                <ul>
                                    <?php
                                    $noiDung = $row['NoiDung'];
                                    $noiDung = str_replace("\n", "</li><li>", $noiDung);
                                    echo "<li>" . $noiDung . "</li>";
                                    ?>
                                </ul>
                            </td>
                            <td style="width: 145px;"><?php echo $row['NgayTao'] ?></td>
                            <td><?php echo $row['Gia'] = number_format($row["Gia"], 0, ",", "."); ?><sup>đ</sup></td>
                            <td><?php echo $row['MaLoai'] ?></td>
                            <td class="body-item-action">
                                <a href="?page=update_product&masp=<?php echo $row['MaSP']; ?>"><img style="width: 50px;" src="assets/images/icon/update-icon.svg" alt="update-icon"></a>
                            </td>
                            <td class="body-item-action">
                                <button type="submit" name='deleteProduct' value="<?php echo $row['MaSP'] ?>">
                                    <img src="assets/images/icon/delete-icon.svg" alt="delete-icon">
                                </button>
                            </td>
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
            xoaSP($conn);
            echo "Xóa tất cả loại thành công";
        } else if (isset($_POST["deleteProduct"])) {
            $MaSP = $_POST["deleteProduct"];
            xoaSPID($conn, $MaSP);
            echo "Xóa sản phẩm $MaSP thành công";
        }
        ?>

    </div>
</section>