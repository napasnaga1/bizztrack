<?php
include 'koneksi.php';

$sql = "SELECT namastok.namastok AS NamaBarang, pemantauan_stok.stok AS StokBarang, namatoko.namatoko AS NamaToko 
        FROM pemantauan_stok
        JOIN namastok ON pemantauan_stok.idstok = namastok.idstok
        JOIN namatoko ON namastok.idtoko = namatoko.idtoko";
$result = $koneksi->query($sql);

$data = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = array(
            'NamaBarang' => $row['NamaBarang'],
            'StokBarang' => $row['StokBarang'],
            'NamaToko' => $row['NamaToko']
        );
    }
}

echo json_encode($data);

$koneksi->close();
?>
