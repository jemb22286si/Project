<?php
// create edit product php
require_once "../../layout/header.php";

$jenis_produk = query("SELECT * FROM jenis_produk");

function add_product($data)
{
    global $conn;
    $kode = $data["kode"];
    $nama = $data["nama"];
    $harga = $data["harga"];
    $stok = $data["stok"];
    $jenis_produk_id = $data["jenis_produk_id"];


    $query = "INSERT INTO produk
                VALUES
            ('','$kode','$nama',  '$harga', '$stok', '$jenis_produk_id')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

if (isset($_POST['add'])) {
    if (add_product($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil ditambahkan!');
                document.location.href = 'product.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal ditambahkan!');
                document.location.href = 'product.php';
            </script>
        ";
    }
}

?>

<div class="row-cols-md-2">
    <div class="container mb-5">
        <div class="card">
            <div class="container-fluid px-5 py-2">
                <h2 class="py-4 text-center">Add Item</h2>
                <form action="" method="POST">

                    <div class="mb-3">
                        <label for="kode" class="form-label">Code</label>
                        <input type="text" class="form-control" id="kode" name="kode" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Product</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Price</label>
                        <input type="number" class="form-control" id="harga" name="harga" required>
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stock</label>
                        <input type="number" class="form-control" id="stok" name="stok" required>
                    </div>

                    <!-- select jenis_produk -->
                    <div class="mb-3">
                        <label for="jenis_produk" class="form-label">Product Type</label>
                        <select class="form-select" aria-label="Default select example" name="jenis_produk_id" id="jenis_produk" required>
                            <option value="">Select Product Type</option>
                            <?php foreach ($jenis_produk as $jp) : ?>
                                <option value="<?= $jp['id']; ?>"><?= $jp['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>

                        <div class=" modal-footer my-4">
                            <a href="product.php" type="button" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-dark ms-2" name="add">Add Item</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
require_once "../../layout/footer.php";
?>