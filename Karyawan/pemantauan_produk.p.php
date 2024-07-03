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
$tanggal = $_POST['tanggal'];
$idstok = $_POST['idstok'];
$stok = $_POST['stok'];

// Membuat koneksi

// Memeriksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Query untuk memasukkan data ke tabel pemantauan_stok
$sql = "INSERT INTO pemantauan_stok (tanggal, idstok, stok)
        VALUES ('$tanggal', '$idstok', '$stok')";

if ($koneksi->query($sql) === TRUE) {
    echo "Pemantauan stok berhasil disimpan.";
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}

$koneksi->close();
?>