<?php
require_once "layout/header.php";


$product = query("SELECT * FROM produk");

function checkout($data)
{
    global $conn;

    $name = htmlspecialchars($data["name"]);
    $product_id = htmlspecialchars($data["product"]);
    $qty = htmlspecialchars($data["qty"]);
    $address = htmlspecialchars($data["address"]);

    $price = query("SELECT harga FROM produk WHERE id = '$product_id'")[0];

    $total = $price['harga'] * $qty;

    $product_name = query("SELECT nama FROM produk WHERE id = '$product_id'")[0]['nama'];

    $query = "INSERT INTO pesanan VALUES ('', '$product_name', '$qty', NOW(), '$total' , '$name', '$address')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

if (isset($_POST['checkout'])) {
    if (checkout($_POST) > 0) {
        header("Location: info.php");
    } else {
        echo "
            <script>
                alert('Data gagal ditambahkan!');
                document.location.href = 'checkout.php;
            </script>
        ";
    }
}


?>

<section class="d-flex justify-content-center" style="max-width: 600px; margin:5rem auto ">
    <form class="text-secondary-color w-100 px-5" action="" method="POST">
        <h1 class="my-3 text-center">Order Product</h1>

        <div class="form-outline mb-4">
            <label class="form-label" for="name">Name</label>
            <input type="text" id="name" class="form-control" name="name" required />
        </div>

        <div class="form-outline mb-4">
            <label class="form-label" for="product">Product</label>
            <select name="product" id="product" class="form-select" required>
                <?php foreach ($product as $p) : ?>
                    <option value="<?= $p['id']; ?>"><?= $p['nama']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-outline mb-4">
            <label class="form-label" for="form1Example2">Qty</label>
            <input type="number" min="0" id="form1Example2" class="form-control" name="qty" required />
        </div>

        <div class="form-outline mb-4">
            <label class="form-label" for="address">Address</label>
            <textarea class="form-control" id="address" rows="4" name="address" required></textarea>
        </div>

        <button type="submit" class="btn btn-secondary-color w-100 mt-3" name="checkout">Checkout</button>
    </form>
</section>

<?php require_once "layout/footer.php" ?>