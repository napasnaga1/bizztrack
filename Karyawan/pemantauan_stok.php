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
    <div class="main">
        <div class="Header">
        <span><i>Pencatatan Stok Produk</i></span>
        <button class="btn"><i class="fa fa-home"></i></button>
        </div>
        <form class="form" action="pemantauan_produk.p.php" method="post">
        <label for="tanggal">Tanggal:</label>
        <input type="date" id="tanggal" name="tanggal" required><br><br>
        
        <label for="idstok">Nama Barang:</label>
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
    </div>
    
    
</body>
</html>