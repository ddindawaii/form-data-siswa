<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background: #f4f4f4; }
        .container { max-width: 500px; margin-top: 50px; }
        .card { border-radius: 12px; padding: 20px; }
        .logo { text-align: center; margin-bottom: 20px; }
        .logo img { width: 80px; }
        .form-group { position: relative; margin-bottom: 20px; }
        .form-group input, .form-group select {
            width: 100%;
            padding: 12px 40px 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            outline: none;
            transition: 0.3s;
        }
        .form-group label {
            position: absolute;
            left: 15px;
            top: 13px;
            font-size: 14px;
            color: #888;
            transition: 0.3s;
        }
        .form-group input:focus + label,
        .form-group input:not(:placeholder-shown) + label,
        .form-group select:focus + label {
            top: -10px;
            left: 10px;
            background: white;
            padding: 2px 5px;
            font-size: 12px;
            color: #007bff;
        }
        .form-group i {
            position: absolute;
            right: 15px;
            top: 13px;
            color: #aaa;
        }
        .btn-submit {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 8px;
        }
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
        <a href="form2.php"><i class="fas fa-plus-circle"></i> Input Data Siswa</a>
        <a href="data_siswa.php"><i class="fas fa-table"></i> Data Siswa</a>
        <a href="dashboard_statistik.php"><i class="fas fa-chart-bar"></i> Statistik</a>
    </div>
    <div class="card">
        <div class="logo">
            <img src="./images/images.jpg" alt="Logo"> 
        </div>
        <h3 class="text-center">Input Data Siswa</h3>
        <form action="proses_simpan.php" method="POST">
            <div class="form-group">
                <input type="text" name="kode_siswa" class="form-control" required placeholder=" ">
                <label>Kode Siswa</label>
                <i class="fa-solid fa-key"></i>
            </div>
            <div class="form-group">
                <input type="text" name="nama_siswa" class="form-control" required placeholder=" ">
                <label>Nama Siswa</label>
                <i class="fa-solid fa-user"></i>
            </div>
            <div class="form-group">
                <textarea name="alamat" class="form-control" required placeholder=" "></textarea>
                <label>Alamat Siswa</label>
                <i class="fa-solid fa-home"></i>
            </div>
            <div class="form-group">
                <input type="date" name="tanggal" class="form-control" required placeholder=" ">
                <label>Tanggal</label>
                <i class="fa-solid fa-calendar"></i>
            </div>
            <div class="form-group">
                <select name="jurusan" class="form-control" required>
                    <option value="" disabled selected></option>
                    <option value="Barista">Barista</option>
                    <option value="Design">Design</option>
                    <option value="Conten Creator">Conten Creator</option>
                    <option value="Junior web dev">Junior web dev</option>
                    <option value="Bakery">Bakery</option>
                    <option value="Welding Foreman">Welding Foreman</option>
                    <option value="Teknisi AC">Teknisi AC</option>
                    <option value="Perhotelan">Perhotelan</option>
                    <option value="Pariwisata">Pariwisata</option>
                    <option value="Animator muda">Animator muda</option>
                    <option value="Elektronika">Elektronika</option>
                    <option value="Teknik Pengelasan">Teknik Pengelasan</option>
                </select>
                <label>Jurusan</label>
                <i class="fa-solid fa-graduation-cap"></i>
            </div>
            <button type="submit" class="btn btn-primary btn-submit">Simpan Data</button>
        </form>
    </div>
</div>

</body>
</html>