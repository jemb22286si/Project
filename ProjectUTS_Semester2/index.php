<?php

require 'layout/header.php';

$products = query("SELECT * FROM produk");
?>

<!-- Background image -->
<div id="hero" class="text-center bg-image" style="
      background-image: url('assets/img/0j.jpg');
      height: 600px;
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-attachment: fixed;
    ">
    <div class="mask" style="background-color: rgba(0,0,0, 0.7);">
        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-primary-color">
                <h1 class="mb-2">Automotive Store</h1>
                <h4 class="mb-4" style="max-width: 800px;">Find the right auto parts, tools, and supplies for your vehicle at Our Store.</h4>
                <a class="btn btn-secondary-color btn-lg" href="#products" role="button">View Product</a>
            </div>
        </div>
    </div>
</div>
<!-- Background image -->

<section class="section-products" id="products">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-md-8 col-lg-6">
                <div class="header">
                    <h3>Featured Product</h3>
                    <h2 class="text-secondary-color" style="font-weight: 900;">Popular Products</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Single Product -->
            <?php foreach ($products as $product) : ?>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div id="product-1" class="single-product">
                        <div class="part-1">
                            <span class="discount">25% off</span>
                            <ul>
                                <li><a href="checkout.php"><i class="fas fa-shopping-cart"></i></a></li>
                                <li><a href="detail.php?id=<?= $product["id"]; ?>"><i class="fas fa-expand"></i></a></li>
                            </ul>
                        </div>
                        <div class="part-2">
                            <h3 class="product-title"><?= $product['nama']; ?></h3>
                            <h4 class="product-old-price"><?= number_format($product['harga'] * 1.5, 2, ",", "."); ?></h4>
                            <h4 class="product-price">Rp. <?= number_format($product['harga'], 2, ",", "."); ?></h4>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php

require 'layout/footer.php';

?>