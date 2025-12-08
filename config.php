<!-- Akan kita gunakan untuk koneksi ke database -->

<?php
$servername = "localhost";
$username = "root";
$password = "root";
$database = "supermarket";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    echo "Connection error " . $conn->connect_error;
    // die("Connection failed: " . $conn->connect_error);
}
?>