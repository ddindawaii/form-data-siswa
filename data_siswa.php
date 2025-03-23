<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <style>
        body { background:rgb(255, 255, 255); }
        .container { margin-top: 50px; }
        .card { border-radius: 12px; padding: 20px; }
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
    <div class="card">
        <h3 class="mb-4">Data Siswa</h3>
        <div class="table-responsive">
            <table id="tabelSiswa" class="table table-striped">
                <thead>
                    <tr>
                        <th>Kode Siswa</th>
                        <th>Nama Siswa</th>
                        <th>Alamat</th>
                        <th>Tanggal</th>
                        <th>Jurusan</th>
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
                    ?>
                    <?php
                    $dataSiswa = bacaDataSiswa();
                    foreach ($dataSiswa as $siswa) {
                        echo "<tr>";
                        echo "<td class='text-center'>{$siswa['kode_siswa']}</td>";
                        echo "<td>{$siswa['nama_siswa']}</td>";
                        echo "<td>{$siswa['alamat']}</td>";
                        echo "<td class='text-center'>{$siswa['tanggal']}</td>";
                        echo "<td class='text-center'>{$siswa['jurusan']}</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tabelSiswa').DataTable();
    });
</script>

</body>
</html>