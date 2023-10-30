<main class="wrapper-product grid wide">
    <h2 class="heading-product">Máy Mac nào phù hợp với bạn?</h2>
    <section class="container-product">
        <?php
        $result = laySP($conn, 2);
        while ($row = $result->fetch_assoc()) {
        ?>

        <div class="product-item">
            <div class="product-item_img">
                <a href="index.php?page=showroom&MaSP=<?php echo $row['MaSP'] ?>" class="product-item-link">
                    <img src="assets/images/<?php echo $row['Hinh']; ?>" alt="mac">
                </a>
            </div>
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
</main>