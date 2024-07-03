<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Pemantauan Stok</title>
</head>
<body>
    <h2>Form Pemantauan Stok</h2>
    <form action="pemantauan_produk.p.php" method="post">
        <label for="tanggal">Tanggal:</label>
        <input type="date" id="tanggal" name="tanggal" required><br><br>
        
        <label for="idstok">Nama Stok:</label>
        <select id="idstok" name="idstok" required>
            <?php
           
           include 'koneksi.php';

            $koneksi = new mysqli($servername, $username, $password, $dbname);

            if ($koneksi->connect_error) {
                die("Koneksi gagal: " . $koneksi->connect_error);
            }

            // Query untuk mendapatkan nama stok
            $sql = "SELECT idstok, namastok FROM namastok";
            $result = $koneksi->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['idstok'] . "'>" . $row['namastok'] . "</option>";
                }
            } else {
                echo "<option value=''>Tidak ada stok tersedia</option>";
            }

            $koneksi->close();
            ?>
        </select><br><br>
        
        <label for="stok">Jumlah Stok:</label>
        <input type="number" id="stok" name="stok" required><br><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>