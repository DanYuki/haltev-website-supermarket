<?php
require_once './helper.php';

// Kalo requestnya POST, maka jalanin ini, skip si tampilan HTML
// Anggap aja buat switch ke backend
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Kita jalankan proses login yang melibatkan database
    proses_login($_POST['username'], $_POST['password']);
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
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

<body class="bg-body-tertiary">
    <header>
        <!-- place navbar here -->
    </header>

    <main class="p-5 container w-50 border mt-5 bg-white rounded-3">
        <h1>Login</h1>
        <!-- Jika terdapat error, maka tampilkan alert -->
        <?php if (isset($_SESSION['error'])): ?>
            <p class="alert alert-danger"><?= $_SESSION['error'] ?></p>
        <?php
            unset($_SESSION['error']);
        endif; ?>
        <form action="#" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control">
            </div>

            <div class="mb-3">
                <label for="username" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <p class="mt-3">Belum punya akun? <a href="./register.php">Daftar</a></p>
        </form>
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