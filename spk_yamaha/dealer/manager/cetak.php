<?php
session_start();
require '../../koneksi.php';

// Simpan log aktivitas mencetak laporan
try {
    $stmt = $pdo->prepare("INSERT INTO log_activity (user, aktivitas) VALUES (?, ?)");
    $stmt->execute([$_SESSION['nama'], 'Mencetak laporan penilaian karyawan']);
} catch (Exception $e) {
    // Kalau gagal log, tidak fatal
}

// Ambil data dari tabel hasil dan join dengan tabel karyawan untuk ambil bidang
$sql = "SELECT h.nik, h.nama, k.bidang, h.V 
        FROM hasil h
        JOIN karyawan k ON h.nik = k.nik
        ORDER BY h.V DESC";
$stmt = $pdo->query($sql);
$hasil = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Penilaian Kinerja Karyawan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        .header1 {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 5px;
        }
        .header1 img {
            width: 50px;
        }
        .header2 .kiri {
            display: flex;
            align-items: center;
            gap: 15px; /* jarak antara logo dan tanggal */
        }
        .header2 .tanggal {
            font-size: 0.9rem;
        }
        h2 {
            text-align: center;
            margin-top: 10px;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
        }
        th, td {
            border: 1px solid #333;
            padding: 8px 12px;
            text-align: center;
        }
        th {
            background: #0044cc;
            color: black;
        }
        thead {
            display: table-header-group;
        }
        @page {
            size: A4 landscape;
        }
    </style>
</head>
<body>
<div class="header1">
    <div></div>
    <img src="../../img/logo.png" alt="Logo">
</div>
<div class="header2">
    <div class="kiri">
        <div class="tanggal"><?= date('d-m-Y') ?></div>
    </div>
</div>

<h2>Laporan Penilaian Kinerja Karyawan</h2>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama Karyawan</th>
            <th>Bidang</th>
            <th>Nilai V</th>
            <th>Ranking</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $no = 1;
    $rank = 1;
    foreach ($hasil as $row):
        // Tentukan keterangan berdasarkan nilai V
        $ket = "-";
        if ($row['V'] > 0.04) {
            $ket = "Sudah Baik, Teruskan";
        } elseif ($row['V'] < 0.01) {
            $ket = "Lebih Baik Dirumahkan Saja";
        } elseif ($row['V'] >= 0.01 && $row['V'] <= 0.04) {
            $ket = "Lebih Tingkatkan Lagi Kinerja nya";
        }
    ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= htmlspecialchars($row['nik']) ?></td>
            <td><?= htmlspecialchars($row['nama']) ?></td>
            <td><?= htmlspecialchars($row['bidang']) ?></td>
            <td><?= number_format($row['V'], 4, ',', '.') ?></td>
            <td><?= $rank++ ?></td>
            <td><?= $ket ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<br>
<br>
<br>
<br>
<br>
<br>
<div style="width: 100%; display: flex; justify-content: flex-end; margin-top: 60px;">
    <div style="text-align: center;">
        <p>Merangin, <?= date('d-m-Y') ?></p>
        <p>KACAB,</p>
        <br><br><br> <!-- ruang untuk tanda tangan -->
        <p style="text-decoration: underline; margin: 0;">______________________</p>
        <p style="margin: 0;">Wahyu Prayogi</p>
        <p style="margin: 0;">(3152000004)</p>
    </div>
</div>

<script>
    window.print();
</script>
</body>
</html>
