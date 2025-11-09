<?php
require '../../dealer/manager/generate_hitung.php';

require '../../koneksi.php';

// Ambil bobot dari tabel kriteria
$kriteriaQuery = $pdo->query("SELECT kode_kriteria, bobot FROM kriteria ORDER BY id");
$kriteria = [];
foreach ($kriteriaQuery as $kr) {
    $kriteria[$kr['kode_kriteria']] = floatval($kr['bobot']);
}

// Ambil data dari tabel hitung
$dataQuery = $pdo->query("SELECT * FROM hitung");
$data = $dataQuery->fetchAll();

// Hitung akar dari jumlah kuadrat untuk tiap kriteria
$penyebut = [
    'C01' => 0, 'C02' => 0, 'C03' => 0, 'C04' => 0, 'C05' => 0
];

foreach ($data as $row) {
    $penyebut['C01'] += pow($row['penilaian_customer'], 2);
    $penyebut['C02'] += pow($row['kedisiplinan'], 2);
    $penyebut['C03'] += pow($row['kualitas_kerja'], 2);
    $penyebut['C04'] += pow($row['sikap_perilaku'], 2);
    $penyebut['C05'] += pow($row['penilaian_rekan_kerja'], 2);
}

// Ambil akarnya
foreach ($penyebut as $kode => $nilai) {
    $penyebut[$kode] = sqrt($nilai);
}

// Normalisasi menggunakan akar jumlah kuadrat
$normalisasi = [];
foreach ($data as $row) {
    $normRow = [
        'nik' => $row['nik'],
        'nama' => $row['nama'],
        'C01' => $row['penilaian_customer'] / $penyebut['C01'],
        'C02' => $row['kedisiplinan'] / $penyebut['C02'],
        'C03' => $row['kualitas_kerja'] / $penyebut['C03'],
        'C04' => $row['sikap_perilaku'] / $penyebut['C04'],
        'C05' => $row['penilaian_rekan_kerja'] / $penyebut['C05'],
    ];
    $normalisasi[] = $normRow;
}

// ---------------------
// Hitung normalisasi terbobot
// ---------------------
$terbobot = [];
foreach ($normalisasi as $row) {
    $terbobotRow = [
    'nik' => $row['nik'],
    'nama' => $row['nama'],
    'C01' => $row['C01'] * $kriteria['C01'],
    'C02' => $row['C02'] * $kriteria['C02'],
    'C03' => $row['C03'] * $kriteria['C03'],
    'C04' => $row['C04'] * $kriteria['C04'],
    'C05' => $row['C05'] * $kriteria['C05'],
];
    $terbobot[] = $terbobotRow;
}

// ---------------------
// Hitung S
// ---------------------
$S = [];
foreach ($terbobot as $row) {
    $sValue = $row['C01'] * $row['C02'] * $row['C03'] * $row['C04'] * $row['C05'];
    $S[] = [
        'nik' => $row['nik'],
        'nama' => $row['nama'],
        'S' => $sValue
    ];
}

// Hitung total S
$totalS = array_sum(array_column($S, 'S'));

// ---------------------
// Hitung V dan ranking
// ---------------------
$V = [];
foreach ($S as $row) {
    $V[] = [
        'nik' => $row['nik'],
        'nama' => $row['nama'],
        'V' => $row['S'] / $totalS
    ];
}
usort($V, function($a, $b) { return $b['V'] <=> $a['V']; });

// Simpan ke database
$pdo->query("DELETE FROM hasil"); // Kosongkan dulu agar tidak duplikat

$rank = 1;
$stmt = $pdo->prepare("INSERT INTO hasil (nik, nama, V, keterangan, ranking) VALUES (?, ?, ?, ?, ?)");

foreach ($V as $row) {
    $keterangan = ($row['V'] > 0.04) ? "Sudah Baik" : (($row['V'] > 0.01) ? "Perlu diperbaiki" : "Dipecat");
    $stmt->execute([
        $row['nik'],
        $row['nama'],
        round($row['V'], 4),
        $keterangan,
        $rank++
    ]);
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Penilaian WP</title>
    <link rel="stylesheet" href="../../assets/styles.css">
    <style>
        table { border-collapse: collapse; width: 90%; margin: 20px auto; }
        th, td { border:1px solid #ccc; padding:8px; text-align:center; }
        th { background: #0044cc; color:white; }
        .navbar1 {
    display: flex;
    justify-content: space-between; /* ini akan kasih jarak */
    align-items: center;
    background-color: #0044cc;
    color: white;
    padding: 13px 30px;
}

.navbar1 a {
    color: white;
    text-decoration: none;
    transition: all 0.3s ease;
}

.navbar1 a:hover {
    text-decoration: underline;
}
    </style>
</head>
<body>
    <header>
   <header>
    <nav class="navbar1">
    <div class="title">WEB PENILAIAN KINERJA KARYAWAN</div>
    <div class="nav-links">
        |<a href="../../dealer/manager/index.php" class="nav-link">HOME</a>|
        <a href="../../dealer/manager/data_karyawan.php" class="nav-link">DATA KARYAWAN</a>|
        <a href="../../dealer/logout.php" class="nav-link">LOG OUT</a>|
    </div>
</nav>

</header>
     <div style="text-align: right; margin: 30px 50px 10px 0;">
    <a href="cetak.php" target="_blank" onclick="return true;" >
    <button>Cetak Laporan</button>
</a>

</div>

    <h2 style="text-align:center;">Tabel Data Awal</h2>
    <table>
        <thead>
            <tr><th>NIK</th><th>Nama</th><th>Penilaian Customer</th><th>Kedisiplinan</th><th>Kualitas Kerja</th><th>Sikap Perilaku</th><th>Penilaian Rekan Kerja</th></tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row): ?>
            <tr>
                <td><?= $row['nik'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['penilaian_customer'] ?></td>
                <td><?= $row['kedisiplinan'] ?></td>
                <td><?= $row['kualitas_kerja'] ?></td>
                <td><?= $row['sikap_perilaku'] ?></td>
                <td><?= $row['penilaian_rekan_kerja'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2 style="text-align:center;">Tabel Normalisasi</h2>
    <table>
        <thead><tr><th>NIK</th><th>Nama</th><th>C01</th><th>C02</th><th>C03</th><th>C04</th><th>C05</th></tr></thead>
        <tbody>
            <?php foreach ($normalisasi as $row): ?>
            <tr>
                <td><?= $row['nik'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= round($row['C01'],4) ?></td>
                <td><?= round($row['C02'],4) ?></td>
                <td><?= round($row['C03'],4) ?></td>
                <td><?= round($row['C04'],4) ?></td>
                <td><?= round($row['C05'],4) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2 style="text-align:center;">Tabel Normalisasi Terbobot</h2>
    <table>
        <thead><tr><th>NIK</th><th>Nama</th><th>C01</th><th>C02</th><th>C03</th><th>C04</th><th>C05</th></tr></thead>
        <tbody>
            <?php foreach ($terbobot as $row): ?>
            <tr>
                <td><?= $row['nik'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= round($row['C01'],4) ?></td>
                <td><?= round($row['C02'],4) ?></td>
                <td><?= round($row['C03'],4) ?></td>
                <td><?= round($row['C04'],4) ?></td>
                <td><?= round($row['C05'],4) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2 style="text-align:center;">Tabel Vektor S</h2>
    <table>
        <thead><tr><th>NIK</th><th>Nama</th><th>S</th></tr></thead>
        <tbody>
            <?php foreach ($S as $row): ?>
            <tr>
                <td><?= $row['nik'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= sprintf("%.8E", $row['S']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2 style="text-align:center;">Tabel Vektor V & Ranking</h2>
    <table>
        <thead><tr><th>Rank</th><th>NIK</th><th>Nama</th><th>V</th><th>Keterangan</th></tr></thead>
        <tbody>
            <?php 
            $rank=1; 
            foreach ($V as $row): 
                $keterangan = ($row['V'] > 0.04) ? "Sudah Baik, Teruskan" : 
             (($row['V'] <= 0.01) ? "Lebih Dirumahkan Saja" : 
             (($row['V'] > 0.01 && $row['V'] <= 0.04) ? "Lebih Tingkatkan Lagi Kinerja nya" : "-"));
            ?>
            <tr>
                <td><?= $rank++ ?></td>
                <td><?= $row['nik'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= round($row['V'],4) ?></td>
                <td><?= $keterangan ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

  
</body>
<footer>
    <div class="detail">
        Pematang Kandis, Kec. Bangko,<br>
        Kabupaten Merangin, Jambi 37311<br>
        0811-2710-141
    </div>
    <div class="logo">
        <img src="../../img/logo.png" alt="Logo">
    </div>
</footer>
<script src="../../assets/script.js"></script>
</html>
