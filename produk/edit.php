<?php
require __DIR__ . "/../layout/header.php";
require __DIR__ . "/../config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $kategori = $_POST['kategori'];

    $stmt = $conn->prepare("UPDATE produk SET nama_produk=?, harga=?, stok=?, kategori=? WHERE id_produk=?");
    $stmt->bind_param('siisi', $nama_produk, $harga, $stok, $kategori, $_GET['id_produk']);
    $stmt->execute();

    session_start();
    $_SESSION['success'] = "Produk berhasil di-edit!";

    header('Location: ./index.php');
}

$produk  = $conn->query("SELECT * FROM produk WHERE id_produk=" . $_GET['id_produk'])->fetch_assoc();
?>

<div class="container mt-4 border p-4 rounded mb-4 shadow-sm">
    <h1>Tambah Produk</h1>

    <form action="#" method="post">
        <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?= $produk['nama_produk'] ?>" required>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" value="<?= $produk['harga'] ?>" required>
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" class="form-control" id="stok" name="stok" value="<?= $produk['stok'] ?>" required>
        </div>

        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select name="kategori" id="kategori" class="form-select">
                <option value="makanan" <?= $produk['kategori'] == 'makanan' ? 'selected' : ''; ?>>Makanan</option>
                <option value="minuman" <?= $produk['kategori'] == 'minuman' ? 'selected' : ''; ?>>Minuman</option>
                <option value="sembako" <?= $produk['kategori'] == 'sembako' ? 'selected' : ''; ?>>Sembako</option>
                <option value="buah" <?= $produk['kategori'] == 'buah' ? 'selected' : ''; ?>>Buah</option>
                <option value="sayur" <?= $produk['kategori'] == 'sayur' ? 'selected' : ''; ?>>Sayur</option>
                <option value="lainnya" <?= $produk['kategori'] == 'lainnya' ? 'selected' : ''; ?>>Lainnya</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>


    <?php
    require __DIR__ . "/../layout/footer.php";
    ?>