<?php
session_start(); // Mulai sesi untuk menyimpan informasi login

include 'koneksi.php';

// Ambil data dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Query untuk memeriksa username dan password
$sql = "SELECT idakunpemilik, username FROM akunpemilik WHERE username = '$username' AND password = '$password'";
$result = $koneksi->query($sql);

if ($result->num_rows > 0) {
    // Jika data ditemukan, set session untuk ID karyawan
    $row = $result->fetch_assoc();
    $_SESSION['id_pemilik'] = $row['idpemilik'];
    // Redirect ke halaman laporan keuangan
    header("Location: home.php");
    exit();
} else {
    // Jika data tidak ditemukan, beri pesan error atau redirect ke halaman login kembali
    echo "Login gagal. Username atau password salah.";
}

$koneksi->close();
?>