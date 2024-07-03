<?php
$servername = "localhost";
$username = "root";
$password = ""; // Ganti dengan password yang sesuai, atau kosong jika tidak ada password
$dbname = "bizztrackk";

// Membuat koneksi
$koneksi = mysqli_connect($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>
