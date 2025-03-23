<?php
function formatTanggal($tanggal) {
    return date("d-m-Y", strtotime($tanggal));
}

function simpanDataSiswa($data) {
    $jsonFile = 'data/siswa.json';
    
    // Baca data yang sudah ada
    $dataSiswa = [];
    if (file_exists($jsonFile)) {
        $jsonData = file_get_contents($jsonFile);
        $dataSiswa = json_decode($jsonData, true) ?? [];
    }
    
    // Format data sebelum disimpan
    $data['tanggal'] = formatTanggal($data['tanggal']);
    
    // Tambahkan data baru
    $dataSiswa[] = $data;
    
    // Simpan kembali ke file JSON tanpa options
    file_put_contents($jsonFile, json_encode($dataSiswa));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dataSiswa = [
        'kode_siswa' => strtoupper($_POST['kode_siswa']), // Konversi ke huruf besar
        'nama_siswa' => ucwords($_POST['nama_siswa']), // Kapitalisasi setiap kata 
        'alamat' => ucfirst($_POST['alamat']), // Kapitalisasi huruf pertama
        'tanggal' => $_POST['tanggal'],
        'jurusan' => $_POST['jurusan']
    ];
    
    simpanDataSiswa($dataSiswa);
    
    header('Location: data_siswa.php');
    exit;
}
?>