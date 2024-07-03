// scripts.js
document.addEventListener('DOMContentLoaded', () => {
    const activeUserCtx = document.getElementById('activeUserChart').getContext('2d');
    const revenueCtx = document.getElementById('revenueChart').getContext('2d');
    const growthCtx = document.getElementById('growthChart').getContext('2d');

    const activeUserData = {
        labels: ['Aktif', 'Non-Aktif'],
        datasets: [{
            label: 'Pengguna',
            data: [300, 120],
            backgroundColor: ['rgba(75, 192, 192, 0.6)', 'rgba(255, 99, 132, 0.6)'],
            borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)'],
            borderWidth: 1
        }]
    };

    const revenueData = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June'],
        datasets: [{
            label: 'Pendapatan (dalam juta)',
            data: [10, 15, 12, 20, 25, 30],
            backgroundColor: 'rgba(54, 162, 235, 0.6)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    };

    const growthData = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June'],
        datasets: [{
            label: 'Pertumbuhan Pengguna',
            data: [10, 20, -5, 30, 10, 15],
            backgroundColor: 'rgba(153, 102, 255, 0.6)',
            borderColor: 'rgba(153, 102, 255, 1)',
            borderWidth: 1
        }]
    };

    const activeUserChart = new Chart(activeUserCtx, {
        type: 'pie',
        data: activeUserData,
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });

    const revenueChart = new Chart(revenueCtx, {
        type: 'bar',
        data: revenueData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Pendapatan (dalam juta)'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Bulan'
                    }
                }
            }
        }
    });

    const growthChart = new Chart(growthCtx, {
        type: 'line',
        data: growthData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Pertumbuhan Pengguna'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Bulan'
                    }
                }
            }
        }
    });
});

// Modal functionality
function openEditModal() {
    document.getElementById('editModal').style.display = 'block';
}

function closeEditModal() {
    document.getElementById('editModal').style.display = 'none';
}

function saveEdits() {
    const jumlahPengguna = document.getElementById('jumlahPenggunaInput').value;
    const jumlahTransaksi = document.getElementById('jumlahTransaksiInput').value;

    document.getElementById('jumlahPengguna').innerText = jumlahPengguna;
    document.getElementById('jumlahTransaksi').innerText = jumlahTransaksi;

    closeEditModal();
}
