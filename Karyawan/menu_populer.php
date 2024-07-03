<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Pemantauan Stok</title>
    <link rel="stylesheet" href="pemantauan_stock.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,700,900');
    </style>
</head>
<body>
    <div class = main>
        <div class = "Header">
        <h2>Form Menu Populer</h2>
        <button class="btn"><i class="fa fa-home"></i></button>
    </div>
    
    <form class="form" action="proses_menu_populer.php" method="post">
        <label for="bulan">Bulan:</label>
        <input type="text" id="bulan" name="bulan" required>
        <label for="jumlah_pesanan">Jumlah Pesanan:</label>
        <input type="number" id="jumlah_pesanan" name="jumlah_pesanan" required>
        
        <label for="menu_id">Nama Menu:</label>
        <select id="menu_id" name="menu_id" required>
            <?php
            
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
        </div>
</body>
</html>