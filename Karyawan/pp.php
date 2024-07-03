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
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="karyawan.css">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,700,900');
    </style>
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Admin Dashboard Panel</title>
</head>
<body>
    <nav>
        <div class="logo-name">
            <span class="logo_name">BIZZTRACK</span>
        </div>
        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="chart_pendapatan.html">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Pendapatan Harian</span>
                </a></li>
                <li><a href="chart_pemantauan.html">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Pemantauan Stok Produk</span>
                </a></li>
                <li><a href="PieChart.html">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Popularitas Produk</span>
                </a></li>
            </ul>
            <ul class="logout-mode">
                <li><a href="#">
                    <a href="">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <form action="" method="post">
                        <button class="link-name" name="logout">Logout</button>
                        </form>
                    </a>
                    
                </a></li>
            </ul>
        
        </div>
    </nav>
    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
            
            <!--<img src="images/profile.jpg" alt="">-->
        </div>
        <div class="dash-content">
            <div class="overview">
                <div class="boxes">
                    <a href="chart_pendapatan.html" class="box box1">
                        <i class="fa-solid fa-money-bill"></i>
                        <span class="text">Pendapatan Harian</span>
                        <span class="tulisan">Menampilkan pendapatan harian dari UMKM
                            dalam bentuk grafik dengan data yang telah
                            dimasukkan oleh karyawan UMKM.
                        </span>
                    </a>   
                    <a href="chart_pemantauan.html" class="box box2">
                            <i class="fa-solid fa-list"></i>
                            <span class="text">Pemantauan Stok Produk</span>
                            <span class="tulisan">Menampilkan ketersediaan stok produk yang dapat
                                dipantau oleh pemilik UMKM, dengan data yang
                                telah dimasukkan oleh karyawan UMKM.
                            </span>
                    </a>
                    <a href="PieChart.html" class="box box3">
                        <i class="fa-solid fa-arrow-trend-up"></i>
                        <span class="text">Popularitas Produk</span>
                        <span class="tulisan">Menampilkan grafik pie chart produk UMKM yang
                            paling populer berdasarkan data hasil masukkan dari
                            karyawan UMKM.
                        </span>
                    </a>        
                </div>
                <div class="poto">
                    <h3>Partner Your Business</h3>
                    <img src="img/poto.jpg" alt="">
                </div>
            </div>
        </div>

    <?php
  } else {
    header("location:login.php");
  }
?>