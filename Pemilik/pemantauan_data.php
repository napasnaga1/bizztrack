<?php
include "koneksi.php";

$sql = "SELECT NamaBarang, StokBarang FROM pemantauanstokproduk";
$result = $koneksi->query($sql);

$data = array();

if ($result->num_rows > 0) {
    // Ambil data
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

$koneksi->close();

echo json_encode($data);
?>