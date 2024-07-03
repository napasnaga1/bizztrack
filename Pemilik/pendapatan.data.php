<?php
include "koneksi.php";

$sql = "SELECT tanggal, laba_bersih AS revenue FROM laporan_keuangan";
$result = $koneksi->query($sql);

$data = [];

if ($result->num_rows > 0) {
    // Mengambil setiap baris data dan menyimpannya dalam array
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    echo json_encode([]);
    exit();
}

// Menutup koneksi
$koneksi->close();

// Mengembalikan data dalam format JSON
echo json_encode($data);
?>