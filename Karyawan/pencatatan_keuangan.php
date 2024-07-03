<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIZZTRACK Form</title>
    <link rel="stylesheet" href="pencatatan_keuangan.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,700,900');
    </style>
</head>
<body>
    <div class="main">
        <div class="Header">
            <span><i>Pencatatan Keuangan</i></span>
            <button class="btn"><i class="fa fa-home"></i></button>
        </div>
        <form class="form" action="pencatatan_keuangan.p.php" method="post">
            <label for="">Pendapatan</label>
            <input type="text" name="Pendapatan" required="">
            <label for="">Pengeluaran</label>
            <input type="text" name="Pengeluaran" required="">
            <label for="tanggal">Tanggal:</label>
            <input type="date" id="tanggal" name="tanggal" required><br><br>
            <input type="hidden" id="idtoko" name="idtoko" value="<?php echo $idtoko; ?>" required>
        
            <div class="kirim">
            <input type="submit" name="submit" value="submit">
            </div>
        </form>
    </div>
</body>
</html>