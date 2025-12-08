<?php
require __DIR__ . "/../layout/header.php";
require __DIR__ . "/../config.php";

$produk = $conn->query("SELECT * FROM produk")->fetch_all(MYSQLI_ASSOC);

?>

<div class="container mt-4 border p-4 rounded mb-4 shadow-sm">
    <h1>Daftar Produk</h1>

    <a href="./create.php" class="btn btn-primary my-2">Tambah Produk</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Harga</th>
                <th scope="col">Stok</th>
                <th scope="col">Kategori</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($produk as $p): ?>
                <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $p['nama_produk']; ?></td>
                    <td><?= $p['harga']; ?></td>
                    <td><?= $p['stok']; ?></td>
                    <td><?= $p['kategori']; ?></td>
                    <td class="">
                        <a href="./edit.php?id_produk=<?= $p['id_produk'] ?>" class="btn btn-warning">Edit</a>
                        <a href="./delete.php?id_produk=<?= $p['id_produk'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus produk ini?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>