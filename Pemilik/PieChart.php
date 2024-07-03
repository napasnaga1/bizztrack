<?php
require 'koneksi.php'; // Ubah sesuai dengan lokasi file koneksi.php Anda
require '../vendor/autoload.php'; // Ubah sesuai dengan lokasi file autoload.php dari library Groq

use LucianoTonet\GroqPHP\Groq;

$groq = new Groq('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');

// SQL query to get the popular menu items for the current month
$sql = "SELECT m.nama_menu AS NamaMenu, SUM(mp.jumlah_pesanan) AS TotalTerjual 
        FROM menupopuler mp
        JOIN menu m ON mp.menu_id = m.menu_id
        WHERE mp.bulan = 'Juli'
        GROUP BY m.nama_menu
        ORDER BY TotalTerjual DESC";

$result = $koneksi->query($sql);

$data = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = array(
            'NamaMenu' => $row['NamaMenu'],
            'TotalTerjual' => $row['TotalTerjual']
        );
    }
}

// Pass the SQL query result to Groq
$chatCompletion = $groq->chat()->completions()->create([
    'model'    => 'llama3-8b-8192',
    'messages' => [
        [
            'role'    => 'system',
            'content' => 'saya adalah sebuah perusahaan yang fokus di dalam bidang bisnis. saya ingin meningkatkan kemajuan bisnis umkm yang ada diindonesia, dengan sistem yang saya bikin yang dapat memudahkan pemilik umkm dengan mudah mengelola bisnis mereka. Tolong jawab dengan menggunakan bahasa indonesia'
        ],
        [
            'role'    => 'user',
            'content' => 'identifikasikan nama menu populer bulan ini berdasarkan tabel ' . json_encode($data) . ' dan saran ide penjualan bulan depan'
        ],
    ]
]);

// Get the completion response
$response = $chatCompletion->json();
echo $response;
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pie Chart Menu Populer</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="piechart.css">
</head>
<body>
    <div class="header">
        <h2>Pie Chart Menu Populer</h2>
    </div>
    <div class="container">
        <div class="left-column">
            <div class="chart-container">
                <canvas id="pieChart"></canvas>
            </div>
        </div>
        <div class="right-column">
            <div class="isinya">
                </div>
                <div class="popular-item">
                <?php echo $chatCompletion['choices'][0]['message']['content']; ?>
                    <!-- Isi data item populer -->
                </div>
            </div>
        </div>
    </div>
    
    <script>
        // Ambil data dari PHP
        fetch('get_data_menu_populer.php')
            .then(response => response.json())
            .then(data => {
                // Buat array untuk label dan data chart
                const labels = data.map(item => item.nama_menu);
                const jumlahPesanan = data.map(item => item.jumlah_pesanan);

                // Konfigurasi dan buat chart
                const ctx = document.getElementById('pieChart').getContext('2d');
                new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Jumlah Pesanan',
                            data: jumlahPesanan,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        aspectRatio: 1,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        let label = context.label || '';
                                        if (label) {
                                            label += ': ';
                                        }
                                        if (context.raw !== null) {
                                            label += context.raw;
                                        }
                                        return label;
                                    }
                                }
                            }
                        }
                    }
                });
            })
            .catch(error => console.error('Error fetching data:', error));
    </script>
</body>
</html>