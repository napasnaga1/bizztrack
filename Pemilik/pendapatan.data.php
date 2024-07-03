<!DOCTYPE html>
<html>
<head>
    <title>Halaman Web Saya</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<style>
/* Tambahkan gaya CSS Anda di sini */
</style>
<body>
    <div class="chart-content">
        <canvas id="myChart"></canvas>
    </div>

    <?php 
    include "koneksi.php"; // Pastikan file koneksi Anda terhubung

    $sql = "
        SELECT 
            laporan_keuangan.tanggal AS tanggal,
            keuangan.pendapatan AS pendapatan
        FROM 
            laporan_keuangan
        INNER JOIN 
            keuangan ON laporan_keuangan.id_keuangan = keuangan.id_keuangan
        ORDER BY 
            laporan_keuangan.tanggal
    ";
    $stmt = $koneksi->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    $tanggal = [];
    $pendapatan = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $tanggal[] = $row['tanggal'];
            $pendapatan[] = (int)$row['pendapatan'];
        }
    } else {
        echo "0 hasil";
    }

    $koneksi->close();
    ?>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const barCtx = document.getElementById('myChart').getContext('2d');
        const barChart = new Chart(barCtx, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($tanggal); ?>,
                datasets: [{
                    label: 'Pendapatan',
                    data: <?php echo json_encode($pendapatan); ?>,
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    fill: false,
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                },
                scales: {
                    x: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Tanggal'
                        }
                    },
                    y: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Pendapatan'
                        }
                    }
                }
            }
        });
    });
    </script>
</body>
</html>