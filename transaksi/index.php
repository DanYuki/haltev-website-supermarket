<?php
require __DIR__ . "/../layout/header.php";
require __DIR__ . "/../config.php";

$troduk = $conn->query("SELECT * FROM produk")->fetch_all(MYSQLI_ASSOC);
$data_transaksi = $conn->query("SELECT p.nama_produk, p.harga, t.qty, (p.harga * t.qty) as total FROM produk p INNER JOIN transaksi t ON p.id_produk = t.id_produk")->fetch_all(MYSQLI_ASSOC);

?>

<div class="container mt-4 border p-4 rounded mb-4 shadow-sm">
    <h1>Daftar Transaksi</h1>

    <a href="./create.php" class="btn btn-primary my-2">Tambah Transaksi</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Harga</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($data_transaksi as $t): ?>
                <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $t['nama_produk']; ?></td>
                    <td>Rp. <?= number_format($t['harga']); ?></td>
                    <td><?= $t['qty']; ?></td>
                    <td><?= $t['total']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php

// require_once 'footer.php'
?>