<?php
require __DIR__ . "/../layout/header.php";
require __DIR__ . "/../config.php";

$produk = $conn->query("SELECT * FROM produk")->fetch_all(MYSQLI_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Logic insert transaksi ke database
    $id_produk = $_POST['id_produk'];
    $qty = $_POST['qty'];

    $stmt = $conn->prepare("INSERT INTO transaksi (id_produk, qty) VALUES (?, ?)");
    $stmt->execute([$id_produk, $qty]);

    session_start();
    $_SESSION['success'] = "Transaksi berhasil ditambahkan!";

    header('Location: ./index.php');
}
?>

<div class="container mt-4 border p-4 rounded mb-4 shadow-sm">
    <h1>Tambah Transaksi</h1>

    <form action="#" method="post">
        <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <select name="id_produk" class="form-select">
                <option disabled selected>=== Pilih Produk ===</option>
                <?php foreach ($produk as $p): ?>
                    <option value="<?= $p['id_produk']; ?>"><?= $p['nama_produk']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="qty" name="qty" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>


    <?php
    require __DIR__ . "/../layout/footer.php";
    ?>