<?php
require 'koneksi.php';

// Query ambil data
$query = $pdo->query("SELECT nik, nama, bidang, jenis_kelamin FROM karyawan ORDER BY nama ASC");
$data_karyawan = $query->fetchAll();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Karyawan</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
    <header>
    <nav class="navbar">
            <div class="title">WEB PENILAIAN KINERJA KARYAWAN</div>
        <a href="index.php" class="nav-link">HOME</a>
    </nav>
        <style>
            /* CENTER */
.center {
    flex: 1 1 100%;
    padding: 50px 20px;
    text-align: center;
}

/* TABLE STYLES */
table {
    width: 80%;
    border-collapse: collapse;
    margin: 30px auto;
    background: white;
}
th, td {
    padding: 12px 18px;
    border: 1px solid #ccc;
    text-align: center;
}
th {
    background: #0044cc;
    color: white;
}
tr:nth-child(even) {
    background: #f2f2f2;
}
        </style>
    </header>
    <div class="main-wrapper">
        <div class="main">
            <div class="center">
                <h2>Data Karyawan</h2>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Bidang</th>
                            <th>Jenis Kelamin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach($data_karyawan as $karyawan): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($karyawan['nik']) ?></td>
                                <td><?= htmlspecialchars($karyawan['nama']) ?></td>
                                <td><?= htmlspecialchars($karyawan['bidang']) ?></td>
                                <td><?= htmlspecialchars($karyawan['jenis_kelamin']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <?php if(count($data_karyawan) == 0): ?>
                            <tr>
                                <td colspan="5">Tidak ada data karyawan.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <footer>
        <div class="detail">
            Pematang Kandis, Kec. Bangko,<br>
            Kabupaten Merangin, Jambi 37311<br>
            0811-2710-141
        </div>
        <div class="logo">
            <img src="img/logo.png" alt="Logo">
        </div>
    </footer>
</body>
</html>
