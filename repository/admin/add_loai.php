<section class="container">
    <div class="container_captaikhoan">
        <h2 class="heading">THÊM LOẠI</h2>
        <form method="post">
            <div class="information">
                <div class="hoten">
                    <label for="tenloai">Tên loại:</label>
                    <input type="text" name="tenloai" id="tenloai" placeholder="Nhập tên loại" required>
                </div>

                <div class="email">
                    <label for="ngaytao">Ngày tạo:</label>
                    <input type="date" name="ngaytao" id="ngaytao" required>
                </div>

                <div class="account">
                    <label for="thutu">Thứ tự:</label>
                    <input type="text" name="thutu" id="thutu" placeholder="Nhập thứ tự" required>
                </div>
            </div>

            <div class="submit">
                <input type="submit" name="addLoai" value="THÊM">
            </div>

        </form>
    </div>
</section>

<?php
if (isset($_POST['addLoai'])) {
    $TenLoai = trim($_POST['tenloai']);
    $NgayTao = $_POST['ngaytao'];
    $thuTu = $_POST['thutu'];
    if (!preg_match("/^[a-zA-Z0-9_]+$/", $TenLoai)) {
        echo "Tên loại không hợp lệ!!!";
    } else {
        $re = layLoai($conn);
        while ($r = mysqli_fetch_array($re)) {
            if ($TenLoai == $r['TenLoai'] || $thuTu == $r['thuTu']) {
                echo "Tên loại hoặc thứ tự đã có rồi. Vui lòng nhập lại";
            }
        }
        // Tiếp tục xử lý khi tất cả các giá trị đều hợp lệ
        $result = addLoai($conn, $TenLoai, $NgayTao, $thuTu);
        if ($result) {
            echo "Thêm loại mới thành công trên Apple Store";
        }
    }
}
?>