<?php

require_once "../../layout/header.php";

$jenis_produk = query("SELECT * FROM jenis_produk");

?>

<div class="d-flex justify-content-end mb-3">
    <a href="add-jenis-produk.php" class="btn btn-primary">Add Product Type</a>
</div>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Data Product Type
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($jenis_produk as $jp) : ?>
                    <tr>
                        <td><?= $jp["id"]; ?></td>
                        <td><?= $jp["nama"]; ?></td>
                        <td>
                            <a href="edit-jenis-produk.php?id=<?= $jp['id']; ?>" class="btn btn-warning">Edit</a>
                            <a href="delete-jenis-produk.php?id=<?= $jp['id']; ?>" class="btn btn-danger" onclick="return confirm('Yakin?')">Delete</a>
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