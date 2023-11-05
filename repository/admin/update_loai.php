<?php
$MaLoai = $_GET["maloai"];
$result_maloai = layLoaiID($conn, $MaLoai);
$row = $result_maloai->fetch_assoc();
?>

<section class="container">
    <div class="container_captaikhoan">
        <h2 class="heading">CẬP NHẬT LOẠI</h2>
        <form method="post">
            <div class="information">
                <div class="hoten">
                    <label for="tenloai">Tên loại:</label>
                    <input type="text" name="tenloainew" id="tenloai" value="<?php echo $row["TenLoai"]; ?>">
                </div>

                <div class="email">
                    <label for="ngaytao">Ngày tạo:</label>
                    <input type="date" name="ngaytaonew" id="ngaytao" value="<?php echo $row["NgayTao"]; ?>">
                </div>

                <div class="account">
                    <label for="thutu">Thứ tự:</label>
                    <input type="text" name="thutunew" id="thutu" value="<?php echo $row["thuTu"]; ?>">
                </div>
            </div>

            <div class="submit">
                <input type="submit" name="updateLoai" value="CẬP NHẬT">
            </div>

        </form>
    </div>
</section>

<?php
if (isset($_POST['updateLoai'])) {
    $TenLoainew = trim($_POST['tenloainew']);
    $NgayTaonew = $_POST['ngaytaonew'];
    $thuTunew = $_POST['thutunew'];

    // Tiếp tục xử lý khi tất cả các giá trị đều hợp lệ
    $result = updateLoai($conn, $MaLoai, $TenLoainew, $NgayTaonew, $thuTunew);
    if ($result) {
        echo "Cập nhật loại mới thành công trên Apple Store";
    }
}
?>