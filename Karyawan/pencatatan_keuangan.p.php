<?php
session_start(); // Mulai sesi, pastikan ini dijalankan di setiap halaman yang membutuhkan informasi login

// Pastikan karyawan sudah login dan Anda memiliki informasi yang diperlukan
if (!isset($_SESSION['id_karyawan'])) {
    die("Error: Karyawan belum login."); // Gantikan dengan logika atau pengalihan sesuai kebutuhan Anda
}

// Ambil ID karyawan dari sesi (diasumsikan disimpan saat proses autentikasi)
$id_karyawan = $_SESSION['id_karyawan'];

// Koneksi ke database (ganti dengan koneksi sesuai dengan pengaturan Anda)
include 'koneksi.php';

// Ambil data dari form
$pendapatan = $_POST['pendapatan'];
$pengeluaran = $_POST['pengeluaran'];
$tanggal = $_POST['tanggal'];

// Membuat koneksi
$koneksi = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Query untuk mendapatkan ID toko berdasarkan karyawan yang sedang login
$sql_toko = "SELECT idtoko FROM akunkaryawan WHERE idkaryawan = $id_karyawan";
$result_toko = $koneksi->query($sql_toko);

if ($result_toko->num_rows > 0) {
    $row_toko = $result_toko->fetch_assoc();
    $idtoko = $row_toko["idtoko"];

    // Query untuk memasukkan data ke tabel keuangan
    $sql_keuangan = "INSERT INTO keuangan (pendapatan, pengeluaran, idtoko)
                    VALUES ('$pendapatan', '$pengeluaran', '$idtoko')";

    if ($koneksi->query($sql_keuangan) === TRUE) {
        $last_id = $koneksi->insert_id; // Mendapatkan ID yang baru saja dimasukkan

        // Query untuk memasukkan data ke tabel laporan_keuangan dengan mengambil ID keuangan yang baru saja dimasukkan
        $sql_laporan = "INSERT INTO laporan_keuangan (id_keuangan, tanggal)
                        VALUES ('$last_id', '$tanggal')";

        if ($koneksi->query($sql_laporan) === TRUE) {
            echo "Laporan keuangan berhasil disimpan.";
        } else {
            echo "Error: " . $sql_laporan . "<br>" . $koneksi->error;
        }
    } else {
        echo "Error: " . $sql_keuangan . "<br>" . $koneksi->error;
    }
} else {
    echo "Error: Tidak dapat menemukan ID toko untuk karyawan yang sedang login.";
}

$koneksi->close();
?>