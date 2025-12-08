<?php
require __DIR__ . "/../config.php";
$id_produk = $_GET['id_produk'];
$stmt = $conn->prepare("DELETE FROM produk WHERE id_produk = ?");
$stmt->bind_param('i', $id_produk);
$stmt->execute();

$_SESSION['success'] = "Produk berhasil dihapus!";
header('Location: ./index.php');
