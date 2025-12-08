<!-- Kita gunakan untuk input data staff baru -->
<?php
require __DIR__ . "/../layout/header.php";
require __DIR__ . "/../config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_staff = $_POST['nama_staff'];
    $posisi = $_POST['posisi'];
    $gaji_pokok = $_POST['gaji_pokok'];
    $tgl_mulai = $_POST['tgl_mulai'];

    $stmt = $conn->prepare("INSERT INTO staff (nama_staff, posisi, gaji_pokok, tgl_mulai) VALUES (?, ?, ?, ?)");
    $stmt->bind_param('ssis', $nama_staff, $posisi, $gaji_pokok, $tgl_mulai);
    $stmt->execute();

    session_start();
    $_SESSION['success'] = "Staff berhasil ditambahkan!";

    header('Location: ./index.php');
}
?>

<div class="container mt-4 border p-4 rounded mb-4 shadow-sm">
    <h1>Tambah Produk</h1>

    <form action="#" method="post">
        <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Staff</label>
            <input type="text" class="form-control" id="nama_staff" name="nama_staff" required>
        </div>

        <div class="mb-3">
            <label for="Posisi" class="form-label">Posisi</label>
            <input type="text" class="form-control" id="posisi" name="posisi" required>
        </div>

        <div class="mb-3">
            <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
            <input type="number" class="form-control" id="gaji_pokok" name="gaji_pokok" required>
        </div>

        <div class="mb-3">
            <label for="kategori" class="form-label">Tanggal Mulai</label>
            <input type="date" name="tgl_mulai" id="tgl_mulai" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>


    <?php
    require __DIR__ . "/../layout/footer.php";
    ?>