<?php
include "../Karyawan/koneksi.php";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_umkm = $_POST['nama_umkm'];
    $sql = "INSERT INTO akun (username, password, nama_umkm) VALUES ('$username', '$password', '$nama_umkm')";

    if (mysqli_query($koneksi, $sql)) {
        echo "<script>
                alert('Input Berhasil');
                window.location.href='index.html';
              </script>";
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
}

mysqli_close($koneksi);
?>