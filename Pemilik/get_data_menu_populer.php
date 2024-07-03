<?php
include 'koneksi.php';
// Memeriksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Query untuk mendapatkan data menu populer
$sql = "SELECT m.nama_menu, mp.jumlah_pesanan
        FROM menupopuler mp
        JOIN menu m ON mp.menu_id = m.menu_id";
$result = $koneksi->query($sql);

$data = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

$koneksi->close();

// Mengembalikan data dalam format JSON
echo json_encode($data);
?>