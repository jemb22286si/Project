<?php
require_once "layout/header.php";

$pesanan = query("SELECT * FROM pesanan ORDER BY id DESC")[0];
?>

<div class="container my-5">
    <h1 class="text-secondary-color" style="font-weight: 900;">Detail Pesanan</h1>
    <div class="card">
        <div class="card-header text-secondary-color bg-primary-color py-2 px-3">
            <i class="fas fa-table me-1"></i>
            Detail Pesanan
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Nama Produk</th>
                    <td><?= $pesanan["nama_produk"]; ?></td>
                </tr>
                <tr>
                    <th>Qty</th>
                    <td><?= $pesanan["qty"]; ?></td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td><?= $pesanan["tanggal"]; ?></td>
                </tr>
                <tr>
                    <th>Total Harga</th>
                    <td>Rp. <?= number_format($pesanan["total_harga"]); ?></td>
                </tr>
                <tr>
                    <th>Nama Pemesan</th>
                    <td><?= $pesanan["nama_pemesan"]; ?></td>
                </tr>
                <tr>
                    <th>Alamat Pemesan</th>
                    <td><?= $pesanan["alamat_pemesan"]; ?></td>
                </tr>
            </table>
            <div class="d-flex justify-content-end">
                <a href="index.php" class="btn btn-secondary-color fs-6 py-2 px-3">Back to Home</a>
            </div>
        </div>
    </div>
</div>

<?php require_once "layout/footer.php" ?>