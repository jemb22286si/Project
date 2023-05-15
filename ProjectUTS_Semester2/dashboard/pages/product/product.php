<?php
require_once "../../layout/header.php";
$product = query("SELECT a.*,b.nama as jenis_produk_name FROM produk a INNER JOIN jenis_produk b ON a.jenis_produk_id=b.id");
?>

<div class="d-flex justify-content-end mb-3">
    <a href="add-product.php" class="btn btn-primary">Add Product</a>
</div>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Data Product
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Product Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($product as $p) : ?>
                    <tr>
                        <td><?= $p["kode"]; ?></td>
                        <td><?= $p["nama"]; ?></td>
                        <td>Rp. <?= number_format($p["harga"]); ?></td>
                        <td><?= $p["stok"]; ?></td>
                        <td><?= $p["jenis_produk_name"]; ?></td>
                        <td>
                            <a href="edit-product.php?id=<?= $p['id']; ?>" class="btn btn-warning">Edit</a>
                            <a href="delete-product.php?id=<?= $p['id']; ?>" class="btn btn-danger" onclick="return confirm('Yakin?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</div>
</main>

<?php require_once "../../layout/footer.php" ?>