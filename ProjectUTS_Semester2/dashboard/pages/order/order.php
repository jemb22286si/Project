<?php
require_once "../../layout/header.php";
$orders = query("SELECT * FROM pesanan");
?>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Data Order
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Qty</th>
                    <th>Tanggal</th>
                    <th>Total Harga</th>
                    <th>Nama Pemesan</th>
                    <th>Alamat Pemesan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order) : ?>
                    <tr>
                        <td><?= $order["id"]; ?></td>
                        <td><?= $order["nama_produk"]; ?></td>
                        <td><?= $order["qty"]; ?></td>
                        <td><?= $order["tanggal"]; ?></td>
                        <td>Rp. <?= number_format($order["total_harga"]); ?></td>
                        <td><?= $order["nama_pemesan"]; ?></td>
                        <td><?= $order["alamat_pemesan"]; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</div>
</main>

<?php require_once "../../layout/footer.php" ?>