<div class="container_sign-up grid wide">
    <h3 class="sign-up-now">Đăng Ký Tài Khoản Apple Store</h3>

    <form class="sign-up-form" method="POST">
        <div class="name-acc">
            <label for="hoten">Họ và tên:</i></label>
            <input type="text" id="hoten" name="HoTen" placeholder="Họ và tên">
        </div>

        <div class="user-acc">
            <label for="user">Tài khoản:</label>
            <input type="text" id="user" name="User" placeholder="Tài khoản">
        </div>

        <div class="password-acc">
            <label for="pass">Mật khẩu:</label>
            <input type="password" id="pass" name="Pass" placeholder="Password">
        </div>

        <div class="email-user">
            <label for="email">Email:</label>
            <input type="email" name="Email" id="email" placeholder="Nhập email">
        </div>

        <div class="phone">
            <label for="sdt">Số điện thoại:</label>
            <input type="tel" name="Sdt" id="sdt" placeholder="Nhập số điện thoại">
        </div>

        <div class="address">
            <label for="Dc">Địa chỉ:</label>
            <input id="Dc" name="DiaChi" placeholder="Nhập địa chỉ của bạn"></input>
        </div>

        <input type="submit" id="sub" name="DangKy" value="Đăng ký">

        <div class="body-thong-bao">
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
    </form>
</div>