<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Laporan Keuangan</title>
</head>
<body>
    <h2>Form Laporan Keuangan</h2>
    <form action="pencatatan_keuangan.p.php" method="post">
        <label for="pendapatan">Pendapatan:</label>
        <input type="text" id="pendapatan" name="pendapatan" required><br><br>
        
        <label for="pengeluaran">Pengeluaran:</label>
        <input type="text" id="pengeluaran" name="pengeluaran" required><br><br>
        
        <label for="tanggal">Tanggal:</label>
        <input type="date" id="tanggal" name="tanggal" required><br><br>
        
        <!-- Input tersembunyi untuk ID Toko -->
        <input type="hidden" id="idtoko" name="idtoko" value="<?php echo $idtoko; ?>" required>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>