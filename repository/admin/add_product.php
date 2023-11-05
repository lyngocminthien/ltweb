<section class="container">
    <div class="container_captaikhoan">
        <h2 class="heading">THÊM SẢN PHẨM</h2>
        <form method="post" enctype="multipart/form-data">
            <div class="information">
                <div class="email tensp">
                    <label for="tsp">Tên sản phẩm:</label>
                    <input type="text" name="tsp" id="tsp" placeholder="Nhập tên sản phẩm" required>
                </div>

                <div class="hoten mota">
                    <label for="mt">Mô tả sản phẩm:</label>
                    <input type="text" name="mt" id="mt" placeholder="Nhập mô tả">
                </div>

                <div class="account hinh">
                    <label for="hinhanh">Hình ảnh sản phẩm:</label>
                    <input type="file" name="hinhanh" id="hinhanh">
                </div>

                <div class="pw noidung">
                    <label for="nd">Nội dung:</label>
                    <textarea name="nd" id="nd"></textarea>
                </div>

                <div class="numberphone ngaytao">
                    <label for="nt">Ngày tạo sản phẩm:</label>
                    <input type="date" name="nt" id="nt" required>
                </div>

                <div class="address price">
                    <label for="gia">Nhập giá sản phẩm:</label>
                    <input type="text" name="gia" id="gia" placeholder="Nhập giá sản phẩm" required>
                </div>

                <div class="loai_sanpham">
                    <label for="lsp">Loại sản phẩm:</label>
                    <select name="lsp" id="lsp">
                        <?php
                        $result_dsLoai = layLoai($conn);
                        while ($row = $result_dsLoai->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $row["MaLoai"] ?>"><?php echo $row["TenLoai"] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="submit">
                <input type="submit" name="addProduct" value="THÊM">
            </div>

        </form>
    </div>
</section>

<?php
if (isset($_POST['addProduct'])) {
    $TenSP =  trim($_POST['tsp']);
    $MoTa = $_POST['mt'];
    $Hinh = $_FILES['hinhanh']['name'];
    move_uploaded_file($_FILES['hinhanh']['tmp_name'], 'assets/images/' . $_FILES['hinhanh']['name']);
    $NoiDung = $_POST['nd'];
    $NgayTao = $_POST['nt'];
    $Gia = $_POST['gia'];
    $MaLoai = $_POST['lsp'];

    $re = laySanPham($conn);
    while ($r = mysqli_fetch_array($re)) {
        if ($TenSP == $r['TenSP'] || $Hinh == $r['Hinh']) {
            echo "Tên sản phẩm hoặc hình đã được sử dụng. Vui lòng nhập lại và chọn lại";
        }
    }
    // Tiếp tục xử lý khi tất cả các giá trị đều hợp lệ
    $result = addSP($conn, $TenSP, $MoTa, $Gia, $Hinh, $NoiDung, $MaLoai, $NgayTao);
    if ($result) {
        echo "Thêm sản phẩm thành công trên Apple Store";
    }
}
?>