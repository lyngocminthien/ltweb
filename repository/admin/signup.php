<div class="container_captaikhoan">
    <h2 class="heading">CẤP TÀI KHOẢN</h2>
    <form method="post">
        <div class="information">
            <div class="name">
                <div class="hoten">
                    <label for="ho">Họ:</label>
                    <input type="text" name="ho" id="ho" placeholder="Nhập họ">
                </div>
                <div class="tenchinh">
                    <label for="ten">Tên:</label>
                    <input type="text" name="ten" id="ten" placeholder="Nhập tên">
                </div>
            </div>

            <div class="sex">
                <span>Chọn giới tính:</span>
                <div class="check-sex">
                    <label for="male">
                        <input type="radio" name="gender" id="male">
                        Nam
                    </label>

                    <label for="female">
                        <input type="radio" name="gender" id="female">
                        Nữ
                    </label>
                </div>
            </div>

            <div class="email">
                <label for="mail">Email:</label>
                <input type="text" name="mail" id="mail" placeholder="Nhập email">
            </div>

            <div class="account">
                <label for="user">Tài khoản:</label>
                <input type="text" name="user" id="user" placeholder="Nhập tài khoản">
            </div>

            <div class="pw">
                <label for="pass">Mật khẩu:</label>
                <input type="password" name="pass" id="pass" placeholder="Nhập mật khẩu">
            </div>
        </div>

        <div class="submit">
            <input type="submit" name="signUp" value="TẠO">
        </div>
    </form>

    <?php
    if (isset($_POST['DangKy'])) {
        $Ht = $_POST['HoTen'];
        $Us = trim($_POST['User']);
        $Pa = ($_POST['Pass']);
        $Em = $_POST['Email'];
        $Sd = $_POST['Sdt'];
        $Dc = $_POST['DiaChi'];
        if (empty($Ht) || empty($Us) || empty($Pa) || empty($Em) || empty($Sd) || empty($Dc)) {
            echo "Vui lòng điền đầy đủ thông tin.";
        } elseif (!preg_match("/^[a-zA-Z0-9_]+$/", $Us)) {
            echo "Tên không hợp lệ!!!";
        } else {
            $re = layThongTin($conn);
            while ($r = mysqli_fetch_array($re)) {
                if ($Us == $r['User'] || $Em == $r['Email'] || $Sd == $r['Sdt']) {
                    echo "<script>
        alert('Tên đăng nhập, Email hoặc số điện thoại đã được sử dụng');
        window.location.href='index.php?page=signup.php';
        </script>.";
                    break;
                }
            }
            // Tiếp tục xử lý khi tất cả các giá trị đều hợp lệ
            $result = SignUp($conn, $Us, $Pa, $Ht, $Em, $Sd, $Dc);
            if ($result) {
                echo "<script>
        alert('Đăng kí tài khoản thành công trên apple store');
        window.location.href='index.php';
        </script>.";
            }
        }
    }
    ?>
</div>