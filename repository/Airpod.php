<main class="wrapper-product grid wide">
    <?php
    $loai = layLoaiID($conn, 5);
    $row_loai = $loai->fetch_assoc();
    ?>
    <h2 class="heading-product"><?php echo $row_loai['TenLoai'] ?> nào phù hợp với bạn?</h2>
    <section class="container-product">
        <?php
        $result = laySP($conn, 5);
        while ($row = $result->fetch_assoc()) {
        ?>

        <div class="product-item">
            <div class="product-item_img">
                <a href="" class="product-item-link">
                    <img src="assets/images/airpod/<?php echo $row['Hinh']; ?>" alt="airpod">
                </a>
            </div>
            <div class="product-item-info">
                <h2 class="product-name"><?php echo $row['TenSP'] ?></h2>
                <p class="product-descripsion"><?php echo $row['MoTa'] ?></p>
                <p class="product-price">Từ <?php echo number_format($row["Gia"], 0, ',', '.'); ?>đ</p>
                <a href="" class="product-buy">Mua</a>
            </div>
        </div>
        <?php
        }
        ?>
    </section>
</main>