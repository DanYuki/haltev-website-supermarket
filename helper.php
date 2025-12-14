<?php 
require_once __DIR__ . "/config.php";
session_start();

// Digunakan untuk memproses data dari form login
function proses_login(string $username, string $password) {
    // Cek dulu, apakah username terdaftar dalam database
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
    $stmt->execute([$username]);

    // Ambil data user dari query di atas, lalu masukkan ke dalam variabel $user
    $user = $stmt->get_result()->fetch_assoc();

    // Jika user tidak ada/tidak ketemu
    if(!$user) {
        $_SESSION['error'] = "Username tidak terdaftar";
        header("Location: ./login.php");
        exit();
    }
    
    // Jika username ada, maka cek passwordnya, sesuai atau tidak
    if(!password_verify($password, $user['password'])) {
        // Jika password tidak sama, maka:
        $_SESSION['error'] = "Password salah";
        header("Location: ./login.php");
        exit();
    }

    // Jika lolos semuanya, maka lanjut ke dashboard
    $_SESSION['loginState'] = true;
    $_SESSION['username'] = $user['username'];
    header("Location: /dashboard.php");
    exit();
}

function proses_register(string $username, string $password, string $nama) {
    global $conn;

    // Hash password dari form register
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO user(username, password, nama) VALUES (?, ?, ?)");
    try {
        $stmt->execute([$username, $hashed_password, $nama]);
    } catch(Exception $e) {
        // Jika proses insert error (misalnya user telah terdaftar), maka lempar ke login kembali
        $_SESSION['error'] = $e->getMessage();
        header("Location: ./login.php");
        exit();
    }

    // Jika tidak terjadi apa-apa, maka lanjut ke dashboard
    header('Location: ./dashboard.php');
    $_SESSION['loginState'] = true;
    exit();
}

function authenticate() {
    // Cek apakah user sudah login atau belum
    if($_SESSION['loginState'] != true) {
        header("Location: ./login.php");
        exit();
    }
}
?>