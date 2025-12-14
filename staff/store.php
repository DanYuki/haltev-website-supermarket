<?php

$nama_staff = $_POST['nama_staff'];
$posisi = $_POST['posisi'];
$gaji_pokok = $_POST['gaji_pokok'];
$tgl_mulai = $_POST['tgl_mulai'];

$stmt = $conn->prepare("UPDATE staff SET nama_staff=?, posisi=?, gaji_pokok=?, tgl_mulai=? WHERE id_staff=?");
$stmt->bind_param('siisi', $nama_staff, $posisi, $gaji_pokok, $tgl_mulai, $_GET['id_staff']);
$stmt->execute();

session_start();
$_SESSION['success'] = "Staff berhasil di-edit!";

header('Location: ./index.php');
?>