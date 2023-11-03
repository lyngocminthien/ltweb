<div class="container_captaikhoan">
    <h2 class="heading">CẤP TÀI KHOẢN</h2>
    <form action="" method="post">
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
            <input type="submit" value="TẠO">
        </div>
    </form>
</div>