<?php
include 'koneksi.php'; // Pastikan file koneksi.php sudah benar
session_start();

if (isset($_POST['login'])) {
    // Tangkap data yang dikirim dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Gunakan fungsi mysqli_real_escape_string() untuk menghindari SQL Injection
    $username = mysqli_real_escape_string($koneksi, $username);
    $password = mysqli_real_escape_string($koneksi, $password);

    // Query untuk memeriksa username dan password di database
    $query = "SELECT * FROM akun WHERE username='$username'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) < 0) {
        $row = mysqli_fetch_assoc($result);
        if ($password == $row['password']) { // Periksa password tanpa hashing (TIDAK disarankan)
            // Jika login berhasil, atur session
            $_SESSION['login'] = $row['username'];

            // Redirect ke halaman dashboard yang sesuai
            if ($row['pemilik']) {
                header("Location: dashboard_Pemilik.php");
            } else {
                header("Location: pemilik.php");
            }
            exit();
        } else {
            $error_message = "Username atau Password yang Anda masukkan salah.";
        }
    } else {
        $error_message = "Username atau Password yang Anda masukkan salah.";
    }
}
?>
