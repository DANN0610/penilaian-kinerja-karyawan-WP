<?php
session_start();
require '../../koneksi.php';

$nik = $_SESSION['nik'] ?? null;

if ($nik) {
    $stmt = $pdo->prepare("SELECT nik, nama, bidang, jenis_kelamin FROM karyawan WHERE nik = ?");
    $stmt->execute([$nik]);
    $user = $stmt->fetch();
}

// Ambil nilai V dan keterangan dari tabel hasil berdasarkan NIK
$nilaiV = null;
$keterangan = "-";

if ($nik) {
    $stmt = $pdo->prepare("SELECT V, keterangan FROM hasil WHERE nik = ?");
    $stmt->execute([$nik]);
    $row = $stmt->fetch();
    if ($row) {
        $nilaiV = $row['V'];
        $keterangan = $row['keterangan'];
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Karyawan</title>
    <link rel="stylesheet" href="../../assets/styles.css">
    <style>
        .navbar1 {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #0044cc;
            color: white;
            padding: 13px 30px;
        }
        .navbar1 a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            transition: all 0.3s ease;
        }
        .navbar1 a:hover {
            text-decoration: underline;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 40px;
            gap: 30px;
            max-width: 1100px;
            margin: auto;
        }
        .profile-container, .nilai-container {
            flex: 1;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.15);
        }
        .profile-container img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            display: block;
            margin: 0 auto 20px;
        }
        h2 {
            text-align: center;
            margin-bottom: 15px;
        }
        .profile-data p, .nilai-data p {
            font-size: 1.1rem;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar1">
            <div class="title">WEB PENILAIAN KINERJA KARYAWAN</div>
            <div class="nav-links">
                <a href="../../dealer/karyawan/data_karyawan.php" class="nav-link">DATA REKAN</a>
                <a href="../../dealer/logout.php" class="nav-link">LOG OUT</a>
            </div>
        </nav>
    </header>

    <div class="container">
        <!-- KIRI: PROFIL -->
        <div class="profile-container">
            <img src="../../img/prof.png" alt="Foto Profil">
            <h2>Profil Karyawan</h2>
            <div class="profile-data">
                <?php if ($user): ?>
                    <p><strong>Nama:</strong> <?= htmlspecialchars($user['nama']) ?></p>
                    <p><strong>NIK:</strong> <?= htmlspecialchars($user['nik']) ?></p>
                    <p><strong>Bidang:</strong> <?= htmlspecialchars($user['bidang']) ?></p>
                    <p><strong>Jenis Kelamin:</strong> <?= htmlspecialchars($user['jenis_kelamin']) ?></p>
                <?php else: ?>
                    <p>Data user tidak ditemukan.</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- KANAN: NILAI -->
        <div class="nilai-container">
            <h2>Hasil Penilaian</h2>
            <div class="nilai-data">
                <?php if ($nilaiV !== null): ?>
                    <p><strong>Nilai V:</strong> <?= $nilaiV ?></p>
                    <p><strong>Keterangan:</strong> <?= $keterangan ?></p>
                <?php else: ?>
                    <p>Nilai belum tersedia untuk Anda.</p>
                <?php endif; ?>
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
    <script src="../../assets/script.js"></script>
</body>
</html>
