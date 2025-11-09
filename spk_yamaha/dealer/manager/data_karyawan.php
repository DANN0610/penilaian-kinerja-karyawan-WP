<?php
session_start();
require '../../koneksi.php';

$nik_login = $_SESSION['nik'] ?? null;

// Ambil semua data karyawan, kecuali yang sedang login
$stmt = $pdo->prepare("SELECT nik, nama, bidang, jenis_kelamin FROM karyawan WHERE nik != ? ORDER BY nama ASC");
$stmt->execute([$nik_login]);
$data_karyawan = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Karyawan</title>
    <link rel="stylesheet" href="../../assets/styles.css">
    <style>
        .center {
            flex: 1 1 100%;
            padding: 50px 20px;
            text-align: center;
        }
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
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
        .btn-nilai, .btn-edit, .btn-tambah {
            padding: 6px 12px;
            background: #0044cc;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            margin: 3px;
        }
        .btn-nilai:hover, .btn-edit:hover, .btn-tambah:hover {
            background: #003399;
        }
        .search-container {
            margin: 0 auto 20px;
            text-align: center;
        }
        .search-container input {
            padding: 8px 12px;
            width: 300px;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 1rem;
        }
        .button-container {
    text-align: right;
    width: 80%;
    margin: 0 auto 10px auto;
}
    </style>
</head>
<body>
<header>
    <nav class="navbar">
        <div class="title">WEB PENILAIAN KINERJA KARYAWAN</div>
        <div class="nav-links">
            <a href="../../dealer/manager/hasil_nilai.php" class="nav-link">HASIL NILAI</a>
            <a href="../../dealer/manager/index.php" class="nav-link">HOME</a>
            <a href="../../dealer/logout.php" class="nav-link">LOG OUT</a>
        </div>
    </nav>
</header>

<div class="main-wrapper">
    <div class="main">
        <div class="center">
    <h2>Data Karyawan</h2>

    <div class="search-container">
        <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Cari nama atau bidang...">
    </div>

    <div class="button-container">
        <a href="../../dealer/manager/tambah_karyawan.php" class="btn-tambah">+ Tambah Karyawan</a>
    </div>

    <table id="karyawanTable">
        <thead>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Bidang</th>
                <th>Jenis Kelamin</th>
                <th>Aksi</th>
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
                    <td>
                        <a href="../../dealer/manager/nilai_karyawan.php?nik=<?= urlencode($karyawan['nik']) ?>" class="btn-nilai">Nilai</a>
                        <a href="../../dealer/manager/edit_karyawan.php?nik=<?= urlencode($karyawan['nik']) ?>" class="btn-edit">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php if(count($data_karyawan) == 0): ?>
                <tr>
                    <td colspan="6">Tidak ada data karyawan lain untuk dinilai.</td>
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
        <img src="../../img/logo.png" alt="Logo">
    </div>
</footer>

<script>
function searchTable() {
    var input = document.getElementById("searchInput");
    var filter = input.value.toLowerCase();
    var rows = document.querySelectorAll("#karyawanTable tbody tr");

    rows.forEach(function(row) {
        var nama = row.cells[2].textContent.toLowerCase();
        var bidang = row.cells[3].textContent.toLowerCase();
        if (nama.includes(filter) || bidang.includes(filter)) {
            row.style.display = "";
        } else {
            row.style.display = "none";
        }
    });
}
</script>

</body>
</html>
