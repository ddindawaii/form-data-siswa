<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { background:rgb(255, 255, 255); }
        .container { margin-top: 50px; }
        .card { border-radius: 12px; padding: 20px; margin-bottom: 20px; }
        .nav-menu {
            margin-bottom: 30px;
            background: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .nav-menu a {
            margin-right: 20px;
            text-decoration: none;
            color: #007bff;
            font-weight: 500;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="nav-menu">
        <a href="form.php"><i class="fas fa-plus-circle"></i> Input Data Siswa</a>
        <a href="data_siswa.php"><i class="fas fa-table"></i> Data Siswa</a>
        <a href="dashboard_statistik.php"><i class="fas fa-chart-bar"></i> Statistik</a>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <h3 class="mb-4">Statistik per Jurusan</h3>
                <canvas id="jurusanChart"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <h3 class="mb-4">Statistik per Tanggal</h3>
                <canvas id="tanggalChart"></canvas>
            </div>
        </div>
    </div>

    <div class="card">
        <h3 class="mb-4">Ringkasan Data</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Jurusan</th>
                        <th>Jumlah Siswa</th>
                        <th>Persentase</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    function bacaDataSiswa() {
                        $jsonFile = 'data/siswa.json';
                        if (file_exists($jsonFile)) {
                            $jsonData = file_get_contents($jsonFile);
                            return json_decode($jsonData, true) ?? [];
                        }
                        return [];
                    }

                    $dataSiswa = bacaDataSiswa();
                    $totalSiswa = count($dataSiswa);
                    
                    // Hitung jumlah per jurusan
                    $jumlahPerJurusan = [];
                    foreach ($dataSiswa as $siswa) {
                        $jurusan = $siswa['jurusan'];
                        if (!isset($jumlahPerJurusan[$jurusan])) {
                            $jumlahPerJurusan[$jurusan] = 0;
                        }
                        $jumlahPerJurusan[$jurusan]++;
                    }

                    // Tampilkan data dalam tabel
                    foreach ($jumlahPerJurusan as $jurusan => $jumlah) {
                        $persentase = ($jumlah / $totalSiswa) * 100;
                        echo "<tr>";
                        echo "<td>{$jurusan}</td>";
                        echo "<td>{$jumlah}</td>";
                        echo "<td>" . number_format($persentase, 2) . "%</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
// Data untuk grafik jurusan
const jurusanData = <?php echo json_encode($jumlahPerJurusan); ?>;
const jurusanLabels = Object.keys(jurusanData);
const jurusanValues = Object.values(jurusanData);

// Grafik Jurusan
const jurusanCtx = document.getElementById('jurusanChart').getContext('2d');
new Chart(jurusanCtx, {
    type: 'pie',
    data: {
        labels: jurusanLabels,
        datasets: [{
            data: jurusanValues,
            backgroundColor: [
                'rgba(255, 99, 132, 0.5)',
                'rgba(54, 162, 235, 0.5)',
                'rgba(255, 206, 86, 0.5)',
                'rgba(75, 192, 192, 0.5)',
                'rgba(153, 102, 255, 0.5)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'right'
            }
        }
    }
});

// Data untuk grafik tanggal
<?php
$jumlahPerTanggal = [];
foreach ($dataSiswa as $siswa) {
    $tanggal = $siswa['tanggal'];
    if (!isset($jumlahPerTanggal[$tanggal])) {
        $jumlahPerTanggal[$tanggal] = 0;
    }
    $jumlahPerTanggal[$tanggal]++;
}
?>
const tanggalData = <?php echo json_encode($jumlahPerTanggal); ?>;
const tanggalLabels = Object.keys(tanggalData);
const tanggalValues = Object.values(tanggalData);

// Grafik Tanggal
const tanggalCtx = document.getElementById('tanggalChart').getContext('2d');
new Chart(tanggalCtx, {
    type: 'bar',
    data: {
        labels: tanggalLabels,
        datasets: [{
            label: 'Jumlah Pendaftaran',
            data: tanggalValues,
            backgroundColor: 'rgba(54, 162, 235, 0.5)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

</body>
</html>
