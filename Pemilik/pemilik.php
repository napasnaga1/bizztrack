<?php
include 'koneksi.php';
session_start();

if (isset($_POST['logout'])) {
    unset($_SESSION);
    session_destroy();
    header("location:login.php");
  }

if (isset($_SESSION['login'])) {
    ?>
   <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BizzTrack</title>
    <link rel="stylesheet" href="dashboard_pemilik.css">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="logo">
                <h1>BIZZTRACK</h1>
            </div>
            <div class="menu">
                <a href="pemantauan_stok.php" class="menu-item">Pemantauan Stok</a>
                <a href="pencatatan_keuangan.php" class="menu-item">Pencatatan Keuangan</a>
            </div>
        </div>
        <div class="main-content">
            <div class="header">
            <form action="" method="post">
                        <button class="link-name" name="logout">Logout</button>
                        </form>
            </div>
            <div class="cards">
                <div class="card">
                    <span>Produk Terjual</span>
                    <br>
                    <span>20 produk</span>
                </div>
                <div class="card">
                    <span>Belanja</span>
                    <br>
                    <span>25 Produk</span>
                </div>
                <div class="card">
                    <span>Pendapatan Hari Ini</span>
                    <br>
                    <span>RP.100.000</span>
                </div>
                <div class="card">
                    <span>Pengeluaran Hari Ini</span>
                    <br>
                    <span>RP.50.000</span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


    <?php
  } else {
    header("location:login.php");
  }
?>