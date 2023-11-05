<?php
if (isset($_GET['searchInput'])) {
    $search = $_GET['searchInput'];
    $result = timkiemSP($conn, $search);

    // Kiểm tra xem có kết quả tìm kiếm hay không
    if ($result->num_rows > 0) {
?>
        <div class="container-product grid wide1">
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
                        while ($row = $result->fetch_assoc()) {
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
                    } else {
                        // Hiển thị thông báo khi không có kết quả tìm kiếm
                        echo "<script>
        alert('Sản phẩm bạn tìm kiếm không có trên hệ thống admin');
        window.location.href='admin.php';
        </script>.";
                    }
                    ?>
                    </tbody>
                </table>
            </form>

            <?php
            if (isset($_POST["deleteProduct"])) {
                $MaSP = $_POST["deleteProduct"];
                xoaSPID($conn, $MaSP);
                echo "Xóa sản phẩm $MaSP thành công";
            }
            ?>
        </div>
    <?php
}
    ?>