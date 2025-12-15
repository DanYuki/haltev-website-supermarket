<?php
include 'config.php';
require_once __DIR__ . "/helper.php";
authenticate();

$sql = "SELECT COUNT(produk.id_produk) as total_produk, COUNT(transaksi.id_transaksi) as total_transaksi, SUM(produk.harga * transaksi.qty) as total_pendapatan
FROM produk INNER JOIN transaksi ON produk.id_produk = transaksi.id_produk";

$data = $conn->query($sql)->fetch_assoc();
$total_staff = $conn->query("SELECT COUNT(id_staff) as total_staff FROM staff")->fetch_assoc();
?>

<!doctype html>
<html lang="en">

<head>
    <title>Supermarket</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />
</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main class="container mt-5 p-1">
        <h1>Dashboard Supermarket</h1>
        <p>Akan diisi konten dari produk, staff, sama transaksi</p>

        <!-- Group of cards -->
        <div class="d-flex gap-3">
            <!-- Product Card -->
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Produk</h5>
                    <p class="card-text text-center"><?= $data['total_produk']; ?></p>
                </div>
            </div>

            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Staff</h5>
                    <p class="card-text text-center"><?= $total_staff['total_staff']; ?></p>
                </div>
            </div>

            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Transaksi</h5>
                    <p class="card-text text-center"><?= $data['total_transaksi']; ?></p>
                </div>
            </div>

            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Pendapatan</h5>
                    <p class="card-text text-center">Rp. <?= number_format($data['total_pendapatan'], 0, ",", "."); ?></p>
                </div>
            </div>

        </div>

        <div class="mt-3">
            <a href="./produk/index.php" class="btn btn-primary">Produk</a>
            <a href="./staff/index.php" class="btn btn-primary">Staff</a>
            <a href="./transaksi/index.php" class="btn btn-primary">Transaksi</a>
        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>