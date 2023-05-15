<?php

require 'layout/header.php';

$id = $_GET['id'];
$product = query("SELECT * FROM produk WHERE id = $id")[0];

?>


<div class="container p-5">
    <div class="row row-cols-1 g-4" style="max-width: 500px; margin:auto">
        <div class="col">
            <div class="card">
                <img src="assets/img/logo.png" class="card-img-top" alt="<?= $product["nama"]; ?> Image" />
                <div class="card-body">
                    <h5 class="card-title"><?= $product["nama"]; ?></h5>
                    <p class="card-text mb-1">
                        Price : Rp. <?= number_format($product["harga"], 2, ",", "."); ?>
                    </p>
                    <p class="card-text">
                        Stock : <?= $product["stok"]; ?>
                    </p>
                    <a href="index.php" class="btn btn-secondary">Back</a>
                    <a href="order.php" class="btn btn-danger">Buy</a>

                </div>
            </div>
        </div>
    </div>
</div>

<?php

require 'layout/footer.php';

?>