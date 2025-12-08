<!-- Digunakan untuk menampilkan seluruh data resource atau table staff -->

<?php
require __DIR__ . "/../layout/header.php";
require __DIR__ . "/../config.php";

$staff = $conn->query("SELECT * FROM staff")->fetch_all(MYSQLI_ASSOC);

?>

<div class="container mt-4 border p-4 rounded mb-4 shadow-sm">
    <h1>Daftar Staff</h1>

    <a href="./create.php" class="btn btn-primary my-2">Tambah Staff</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama Staff</th>
                <th scope="col">Posisi</th>
                <th scope="col">Gaji Pokok</th>
                <th scope="col">Tanggal Mulai</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($staff as $s): ?>
                <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $s['nama_staff']; ?></td>
                    <td><?= $s['posisi']; ?></td>
                    <td><?= $s['gaji_pokok']; ?></td>
                    <td><?= $s['tgl_mulai']; ?></td>
                    <td class="">
                        <a href="./edit.php?id_staff=<?= $s['id_staff'] ?>" class="btn btn-warning">Edit</a>
                        <a href="./delete.php?id_staff=<?= $s['id_staff'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus produk ini?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>