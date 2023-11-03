<div class="container_log-in">
    <form action="admin.php" method="post">
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
</div>

<?php
if (isset($_POST['signIn'])) {
    $user = $_POST['user'];
    $pass = ($_POST['pass']);
    $re = logIn($conn, $user, $pass);
    if (mysqli_num_rows($re) > 0) {
        $r = mysqli_fetch_array($re);
        $_SESSION["User"] = $r["User"];
        $_SESSION["LoaiTK"] = $r["LoaiTK"];
        if ($r['LoaiTK'] == 1) {
            $_SESSION['signIn'] = $user;
        }
    } else {
        echo "<div style='font-size: 17px;
                                color: var(--notification);
                                font-weight: 600;' 
                                class='ThongBao'>
                                Tài khoản hoặc mật khẩu không hợp lệ
                                </div>";
    }
}
?>