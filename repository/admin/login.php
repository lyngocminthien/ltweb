<div class="container_log-in">
    <form class="form_sign-in" action="" method="post">
        <div class="username">
            <label for="user">Username:</label>
            <input type="text" name="user" id="user">
        </div>

        <div class="password">
            <label for="pass">Password:</label>
            <input type="password" name="pass" id="pass">
        </div>

        <input type="submit" name="signIn" value="LOGIN">
    </form>

    <?php
    if (isset($_POST['signIn'])) {
        $username = $_POST['user'];
        $password = $_POST['pass'];

        // Kiểm tra username và password ở đây
        $result = logIn($conn, $username, $password);
        $row = $result->fetch_assoc();
        // Nếu thông tin đăng nhập chính xác, lưu thông tin người dùng vào biến session
        $_SESSION['User'] = $row['User'];
        $_SESSION["LoaiTK"] = $r["LoaiTK"];
        if ($_SESSION['LoaiTK'] == 0) {
            header('Location: index.php');
            exit;
        } else {
            header("Location: admin.php");
            exit;
        }
    }
    ?>
</div>