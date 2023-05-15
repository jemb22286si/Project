<?php
// create edit product php
require_once "../../layout/header.php";
$id = $_GET['id'];
$product = query("SELECT * FROM produk WHERE id = $id")[0];

function edit_product($data)
{

    global $conn;
    $id = $data["id"];
    $kode = htmlspecialchars($data["kode"]);
    $nama = htmlspecialchars($data["nama"]);
    $harga = htmlspecialchars($data["harga"]);
    $stok = htmlspecialchars($data["stok"]);

    $query = "UPDATE produk SET
                kode = '$kode',
                nama = '$nama',
                harga = '$harga',
                stok = '$stok'
                WHERE id = $id
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}



if (isset($_POST['edit'])) {
    if (edit_product($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil diubah!');
                document.location.href = 'product.php?title=Product';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal diubah!');
                document.location.href = 'product.php?title=Product';
            </script>
        ";
    }
}

?>

<div class="row-cols-md-2">
    <div class="container mb-5">
        <div class="card">
            <div class="container-fluid px-5 py-2">
                <h2 class="py-4 text-center">Edit Item</h2>
                <form action="" method="POST">
                    <input type="hidden" name="id" value="<?= $product['id']; ?>">
                    <div class="mb-3">
                        <label for="kode" class="form-label">Code</label>
                        <input type="text" class="form-control" id="kode" name="kode" value="<?= $product['kode']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Product</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $product['nama']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Price</label>
                        <input type="number" class="form-control" id="harga" name="harga" value="<?= $product['harga']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stock</label>
                        <input type="number" class="form-control" id="stok" name="stok" value="<?= $product['stok']; ?>" required>
                    </div>

                    <div class="modal-footer my-4">
                        <a href="product.php" type="button" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-dark ms-2" name="edit">Edit Item</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>


<?php
require_once "../../layout/footer.php";
?>