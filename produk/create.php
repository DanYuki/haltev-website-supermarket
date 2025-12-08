<?php
require __DIR__ . "/../layout/header.php";
require __DIR__ . "/../config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $kategori = $_POST['kategori'];

    $stmt = $conn->prepare("INSERT INTO produk (nama_produk, harga, stok, kategori) VALUES (?, ?, ?, ?)");
    $stmt->bind_param('siis', $nama_produk, $harga, $stok, $kategori);
    $stmt->execute();

    session_start();
    $_SESSION['success'] = "Produk berhasil ditambahkan!";

    header('Location: ./index.php');
}
?>

<div class="container mt-4 border p-4 rounded mb-4 shadow-sm">
    <h1>Tambah Produk</h1>

    <form action="#" method="post">
        <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" required>
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" class="form-control" id="stok" name="stok" required>
        </div>

        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select name="kategori" id="kategori" class="form-select">
                <option value="makanan">Makanan</option>
                <option value="minuman">Minuman</option>
                <option value="sembako">Sembako</option>
                <option value="buah">Buah</option>
                <option value="sayur">Sayur</option>
                <option value="lainnya">Lainnya</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>


    <?php
    require __DIR__ . "/../layout/footer.php";
    ?>