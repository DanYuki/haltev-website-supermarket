<?php
require_once __DIR__ . "/config.php";
session_start();

// Digunakan untuk memproteksi halaman yang hanya boleh diakses oleh admin
function authenticate() {
    // Cek apakah user sudah login atau belum
    if(!isset($_SESSION['loginState']) || $_SESSION['loginState'] != true) {
        // Jika belum login, maka arahkan user ke halaman login.php
        header("Location: login.php");
        exit();
    }

}

function proses_login(string $username, string $password)
{
    // Cari dulu user di dalam database berdasarkan username yang dimasukkan
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->get_result()->fetch_assoc();

    // Jika user tidak ditemukan
    if (!$user) {
        $_SESSION['error'] = "Username tidak ditemukan!";
        header("Location: ./login.php");
        exit();
    }

    // Cek apakah password sesuai atau tidak
    if (!password_verify($password, $user['password'])) {
        $_SESSION['error'] = "Password salah!";
        header("Location: ./login.php");
        exit();
    }

    // Jika berhasil, maka lanjutkan ke dashboard dan juga set session login
    $_SESSION['loginState'] = true;
    $_SESSION['username'] = $username;
    header("Location: ./dashboard.php");
    exit();
}

function proses_register(string $username, string $password, string $nama)
{
    global $conn;

    try {
        // Hash password sebelum diinput ke dalam database dengan algoritma BCRYPT
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Daftarkan user baru ke dalam database
        $stmt = $conn->prepare("INSERT INTO user (username, password, nama) VALUES (?, ?, ?)");
        $stmt->execute([$username, $password, $nama]);
    } catch (Exception $e) {
        // Kembalikan user ke halaman register jika proses registrasi gagal dengan pesan error
        $_SESSION['error'] = $e->getMessage();
        header("Location: ./register.php");
        exit();
    }

    // Jika berhasil, maka arahkan user ke dashboard
    header("Location: ./dashboard.php");
    exit();
}

function logout() {
    session_destroy();
    header("Location: ./login.php");
    exit();
}