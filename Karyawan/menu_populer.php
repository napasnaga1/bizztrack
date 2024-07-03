<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Menu Populer</title>
</head>
<body>
    <h2>Form Menu Populer</h2>
    <form action="proses_menu_populer.php" method="post">
        <label for="bulan">Bulan:</label>
        <input type="text" id="bulan" name="bulan" required><br><br>
        
        <label for="jumlah_pesanan">Jumlah Pesanan:</label>
        <input type="number" id="jumlah_pesanan" name="jumlah_pesanan" required><br><br>
        
        <label for="menu_id">Nama Menu:</label>
        <select id="menu_id" name="menu_id" required>
            <?php
            // Koneksi ke database
            
            include 'koneksi.php';

            // Query untuk mendapatkan nama menu
            $sql = "SELECT menu_id, nama_menu FROM menu";
            $result = $koneksi->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['menu_id'] . "'>" . $row['nama_menu'] . "</option>";
                }
            } else {
                echo "<option value=''>Tidak ada menu tersedia</option>";
            }

            $koneksi->close();
            ?>
        </select><br><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>