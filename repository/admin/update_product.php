<?php
$MaSP = $_GET["masp"];
$result_masp = layChiTietSanPham($conn, $MaSP);
$row = $result_masp->fetch_assoc();
?>

<section class="container">
    <div class="container_captaikhoan">
        <h2 class="heading">CẬP NHẬT SẢN PHẨM</h2>
        <form method="post">
            <div class="information">
                <div class="hoten">
                    <label for="tenloai">Tên sản phẩm:</label>
                    <input type="text" name="tenspnew" id="tenloai" value="<?php echo $row["TenSP"]; ?>">
                </div>

                <div class="account mota">
                    <label for="mt">Mô tả sản phẩm:</label>
                    <input type="text" name="motanew" id="mt" value="<?php echo $row["MoTa"]; ?>">
                </div>

                <div class="numberphone hinh">
                    <label for="hinhanh">Hình ảnh sản phẩm:</label>
                    <img style="width: 100px;" src="assets/images/<?php echo $row["Hinh"]; ?>" alt="image_sp">
                    <input type="hidden" name="hinhanh_tamp" value="<?php echo $row["Hinh"]; ?>">
                    <input type="file" name="hinhanhnew" id="hinhanh">
                </div>

                <div class="pw noidung">
                    <label for="nd">Nội dung:</label>
                    <textarea style="height: 200px;" name="noidungnew" id="nd"><?php echo $row["NoiDung"]; ?></textarea>
                </div>

                <div class="email">
                    <label for="ngaytao">Ngày tạo:</label>
                    <input type="date" name="ngaytaonew" id="ngaytao" value="<?php echo $row["NgayTao"]; ?>">
                </div>

                <div class="address price">
                    <label for="gia">Nhập giá sản phẩm:</label>
                    <input type="text" name="gianew" id="gia" value="<?php echo $row["Gia"]; ?>">
                </div>

                <div class="loai_sanpham">
                    <label for="lsp">Loại sản phẩm:</label>
                    <select name="lspnew" id="lsp">
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
                <input type="submit" name="updateSP" value="CẬP NHẬT">
            </div>

        </form>
    </div>
</section>

<?php
if (isset($_POST['updateSP'])) {
    $TenSPnew =  trim($_POST['tenspnew']);
    $MoTanew = $_POST['motanew'];
    $Hinhnew = "";
    if (isset($_FILES["hinhanhnew"])) {
        $Hinhnew = $_FILES['hinhanhnew']['name'];
        move_uploaded_file($_FILES['hinhanhnew']['tmp_name'], 'assets/images/' . $_FILES['hinhanhnew']['name']);
    } else {
        $Hinhnew = $_POST["hinhanh_tamp"];
    }
    $NoiDungnew = $_POST['noidungnew'];
    $NgayTaonew = $_POST['ngaytaonew'];
    $Gianew = $_POST['gianew'];
    $MaLoainew = $_POST['lspnew'];

    // Tiếp tục xử lý khi tất cả các giá trị đều hợp lệ
    $result = updateSP($conn, $MaSP, $TenSPnew, $MoTanew, $Gianew, $Hinhnew, $NoiDungnew, $MaLoainew, $NgayTaonew);
    if ($result) {
        echo "Cập nhật sản phẩm có mã $MaSP thành công trên Apple Store";
    }
}
?>