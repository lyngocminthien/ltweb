<?php
if (isset($_GET['input-search'])) {
    $search = $_GET['input-search'];
    $result = timkiemSP($conn, $search);

    // Kiểm tra xem có kết quả tìm kiếm hay không
    if ($result->num_rows > 0) {
        // Mở thẻ section của kết quả tìm kiếm
?>
        <section class="container-product grid wide">
            <?php
            while ($row = $result->fetch_assoc()) {
                // Hiển thị thông tin sản phẩm tìm kiếm
            ?>
                <div class="product-item">
                    <!-- Ảnh -->
                    <div class="product-item_img">
                        <a href="index.php?page=showroom&MaSP=<?php echo $row['MaSP'] ?>" class="product-item-link">
                            <img src="assets/images/<?php echo $row['Hinh']; ?>" alt="device_search">
                        </a>
                    </div>

                    <!-- Thông tin -->
                    <div class="product-item-info">
                        <h2 class="product-name"><?php echo $row['TenSP'] ?></h2>
                        <p class="product-descripsion"><?php echo $row['MoTa'] ?></p>
                        <p class="product-price">Từ <?php echo number_format($row["Gia"], 0, ',', '.'); ?>đ</p>
                        <a href="index.php?page=showroom&MaSP=<?php echo $row['MaSP'] ?>" class="product-buy">Mua</a>
                    </div>
                </div>
            <?php
            }
            ?>
        </section>
<?php
    } else {
        // Hiển thị thông báo khi không có kết quả tìm kiếm
        echo "<script>
        alert('Sản phẩm bạn tìm kiếm không có trên apple store');
        window.location.href='index.php';
        </script>.";
    }
}
?>