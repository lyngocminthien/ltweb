<?php

$MaSP = $_GET['MaSP'];
$chitietsanpham = layChiTietSanPham($conn, $MaSP);
$rsp = mysqli_fetch_array($chitietsanpham);
?>

<body>
    <div class="container">
        <form action="index.php?page=cart.php" method="post">
            <div class="Ten"><?php echo $rsp['TenSP'] ?></div>
            <div class="info">
                <div class="Hinh"><img src='assets/images/<?php echo $rsp['Hinh'] ?>'></div>
                <div class="NoiDung">
                    <div class="Gia">
                        <?php echo $rsp["Gia"] = number_format($rsp["Gia"], 0, ",", "."); ?><sup>đ</sup>
                    </div>
                    <div class="Noidung_Mota">
                        <ul class="Mota">
                            <?php
                            $noiDung = $rsp['NoiDung'];
                            $noiDung = str_replace("\n", "</li><li>", $noiDung);
                            echo "<li>" . $noiDung . "</li>";
                            ?>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="buy-product">
                <button id="addtocard" name="addtocard">
                    <div>
                        <strong>Mua ngay</strong>
                    </div>
                    <p>Giao hàng tận nơi khi mua ngay hoặc mua tại cửa hàng</p>
                </button>
            </div>
            <input type="hidden" value="<?php echo $rsp['MaSP']; ?>" name="MaSP">
            <input type="hidden" value="<?php echo $rsp['TenSP']; ?>" name="TenSP">
            <input type="hidden" value="<?php echo $rsp['Hinh']; ?>" name="Hinh">
            <input type="hidden" value="<?php echo $rsp["Gia"]; ?>" name="Gia">
            <input type="hidden" name="SoLuong" value="1">
        </form>
    </div>
</body>