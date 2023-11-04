<div class="container_captaikhoan">
    <h2 class="heading">CẤP TÀI KHOẢN</h2>
    <form method="post">
        <div class="information">
            <div class="hoten">
                <label for="ten">Họ tên:</label>
                <input type="text" name="ten" id="ten" placeholder="Nhập tên" required>
            </div>

            <div class="email">
                <label for="mail">Email:</label>
                <input type="text" name="mail" id="mail" placeholder="Nhập email" required>
            </div>

            <div class="account">
                <label for="user">Tài khoản:</label>
                <input type="text" name="user" id="user" placeholder="Nhập tài khoản" required>
            </div>

            <div class="pw">
                <label for="pass">Mật khẩu:</label>
                <input type="password" name="pass" id="pass" placeholder="Nhập mật khẩu" required>
            </div>

            <div class="numberphone">
                <label for="phone">Số điện thoại:</label>
                <input type="text" name="phone" id="phone" placeholder="Nhập số điện thoại" required>
            </div>

            <div class="address">
                <label for="dc">Nhập địa chỉ:</label>
                <input type="text" name="dc" id="dc" placeholder="Nhập địa chỉ" required>
            </div>
        </div>

        <div class="submit">
            <input type="submit" name="signUp" value="TẠO">
        </div>

    </form>
</div>

<?php
if (isset($_POST['signUp'])) {
    $HoTen = $_POST['ten'];
    $Email = $_POST['mail'];
    $User = trim($_POST['user']);
    $Pass = $_POST['pass'];
    $Sdt = $_POST['phone'];
    $DiaChi = $_POST['dc'];
    if (!preg_match("/^[a-zA-Z0-9_]+$/", $User)) {
        echo "Tên không hợp lệ!!!";
    } else {
        $re = layThongTin($conn);
        while ($r = mysqli_fetch_array($re)) {
            if ($User == $r['User'] || $Email == $r['Email'] || $Sdt == $r['Sdt']) {
                echo "<script>
        alert('Tên đăng nhập, Email hoặc số điện thoại đã được sử dụng');
        window.location.href='?page=signup';
        </script>.";
                exit;
            }
        }
        // Tiếp tục xử lý khi tất cả các giá trị đều hợp lệ
        $result = SignUpAdmin($conn, $User, $Pass, $HoTen, $Email, $Sdt, $DiaChi, 1);
        if ($result) {
            echo "<script>
        alert('Cấp tài khoản admin thành công trên apple store');
        window.location.href='admin.php';
        </script>";
        }
    }
}
?>