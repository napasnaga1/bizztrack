<?php
session_start(); // Mulai sesi untuk menyimpan informasi login

// Pastikan karyawan sudah login dan Anda memiliki informasi yang diperlukan
if (!isset($_SESSION['id_karyawan'])) {
    die("Error: Karyawan belum login."); // Gantikan dengan logika atau pengalihan sesuai kebutuhan Anda
}

// Ambil ID karyawan dari sesi (diasumsikan disimpan saat proses autentikasi)
$id_karyawan = $_SESSION['id_karyawan'];

include 'koneksi.php';

// Ambil data dari form
$bulan = $_POST['bulan'];
$jumlah_pesanan = $_POST['jumlah_pesanan'];
$menu_id = $_POST['menu_id'];


// Memeriksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Query untuk memasukkan data ke tabel menupopuler
$sql = "INSERT INTO menupopuler (bulan, jumlah_pesanan, menu_id)
        VALUES ('$bulan', '$jumlah_pesanan', '$menu_id')";

if ($koneksi->query($sql) === TRUE) {
    echo "Data menu populer berhasil disimpan.";
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}

$koneksi->close();
?>