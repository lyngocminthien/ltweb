<section class="container">
    <div class="container-loai grid wide1">
        <h3 style="font-size: 35px;" class="heading-cart">Tất cả các loại trên Apple Store</h3>
        <form action="?page=loai" method="post">
            <table class="table-loai cart-table" border="1">
                <thead class="table-head">
                    <tr class="row-head head-list-info">
                        <th class="col-head head-item-info">Mã Loại</th>
                        <th class="col-head head-item-info">Tên Loại</th>
                        <th class="col-head head-item-info">Ngày tạo</th>
                        <th class="col-head head-item-info">Thứ tự</th>
                        <th class="col-head head-item-info">Cập nhật</th>
                        <th class="col-head head-item-info">Xóa</th>
                    </tr>
                </thead>
                <tbody class="table-body">
                    <?php
                    $result_loai = layLoai($conn);
                    while ($row = $result_loai->fetch_assoc()) {
                    ?>
                        <tr class="body-list-info">
                            <td><?php echo $row['MaLoai'] ?></td>
                            <td><?php echo $row['TenLoai'] ?></td>
                            <td><?php echo $row['NgayTao'] ?></td>
                            <td><?php echo $row['thuTu'] ?></td>
                            <td class="body-item-action">
                                <a href="?page=update_loai&maloai=<?php echo $row['MaLoai']; ?>"><img style="width: 50px;" src="assets/images/icon/update-icon.svg" alt="update-icon"></a>
                            </td>
                            <td class="body-item-action">
                                <button type="submit" name='deleteLoai' value="<?php echo $row['MaLoai'] ?>">
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
            xoaLoai($conn);
            echo "Xóa tất cả loại thành công";
            //     echo "<script>
            // alert('Xóa tất cả loại thành công');
            // window.location.href='?page=loai';
            // </script>.";
        } else if (isset($_POST["deleteLoai"])) {
            $MaLoai = $_POST["deleteLoai"];
            xoaSPmaLoai($conn, $MaLoai);
            xoaLoaiID($conn, $MaLoai);
            echo "Xóa loại $MaLoai thành công";
            //     echo "<script>
            // alert('Xóa loại $MaLoai thành công');
            // window.location.href='?page=loai';
            // </script>.";
        }
        ?>

    </div>
</section>