<?php
include 'koneksi.php';

// Memeriksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Mengambil data dari formulir
$namalengkap = $_POST['namalengkap'];
$username = $_POST['username'];
$password = $_POST['password'];
$namatoko = $_POST['namatoko'];

// Menyisipkan data ke tabel namatoko
$sql = "INSERT INTO namatoko (namatoko) VALUES ('$namatoko')";

if ($koneksi->query($sql) === TRUE) {
    // Mendapatkan idtoko yang baru saja disisipkan
    $idtoko = $koneksi->insert_id;

    // Menyisipkan data ke tabel akunkaryawan
    $sql = "INSERT INTO akunkaryawan (username, password, idtoko, namalengkap) VALUES ('$username', '$password', '$idtoko', '$namalengkap')";

    if ($koneksi->query($sql) === TRUE) {
        echo "Registrasi berhasil!";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}

// Menutup koneksi
$koneksi->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Registrasi</title>
</head>
<body>
    <h2>Form Registrasi</h2>
    <form action="register.php" method="post">
        <label for="namalengkap">Nama Lengkap:</label>
        <input type="text" id="namalengkap" name="namalengkap" required><br><br>
        
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <label for="namatoko">Nama Toko:</label>
        <input type="text" id="namatoko" name="namatoko" required><br><br>
        
        <input type="submit" value="Register">
    </form>
</body>
</html>