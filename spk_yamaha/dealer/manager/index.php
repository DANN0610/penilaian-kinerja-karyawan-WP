<?php
session_start();
require '../../koneksi.php';

if (!isset($_SESSION['nik']) || $_SESSION['role'] !== 'manager') {
    header("Location: ../login.php");
    exit;
}

// Ambil data user pending
$stmt = $pdo->query("SELECT * FROM tb_user WHERE status = 'pending'");
$pendingUsers = $stmt->fetchAll();
$jumlahPending = count($pendingUsers);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Manager</title>
    <link rel="stylesheet" href="../../assets/styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f8ff;
        }

        .navbar1 {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #0044cc;
            color: white;
            padding: 13px 30px;
            position: relative;
        }

        .navbar1 a {
            color: white;
            text-decoration: none;
            margin: 0 5px;
        }

        .navbar1 a:hover {
            text-decoration: underline;
        }

        .notif-icon {
            position: relative;
            cursor: pointer;
            font-size: 20px;
        }

        .notif-icon .badge {
            position: absolute;
            top: -8px;
            right: -10px;
            background: red;
            color: white;
            border-radius: 50%;
            padding: 2px 6px;
            font-size: 12px;
        }

        .notif-popup {
            position: fixed;
            top: 70px;
            right: 20px;
            width: 300px;
            max-height: 300px;
            background: white;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
            border-radius: 8px;
            padding: 15px;
            display: none;
            overflow-y: auto;
            z-index: 999;
        }

        .notif-popup h4 {
            margin-bottom: 10px;
            font-size: 16px;
            color: #0044cc;
        }

        .notif-popup .user-item {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        .notif-popup .user-item:last-child {
            border-bottom: none;
        }

        .notif-popup .user-item a {
            color: #0044cc;
            font-weight: bold;
            text-decoration: none;
        }

        .profile-container {
            max-width: 500px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
            text-align: center;
        }

        .profile-container img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
        }

        .profile-data p {
            font-size: 1.1rem;
            margin: 8px 0;
        }

        footer {
            background: #3b4966;
            padding: 20px;
            text-align: center;
        }

        .detail {
            font-size: 0.9rem;
        }

        .logo img {
            height: 40px;
            margin-top: 10px;
        }
        .nav-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }
    </style>
</head>
<body>

<header>
    <nav class="navbar1">
    <div class="title">WEB PENILAIAN KINERJA KARYAWAN</div>
    <div class="nav-right">
        <div class="notif-icon" onclick="toggleNotif()">
            🔔
            <?php if ($jumlahPending > 0): ?>
                <span class="badge"><?= $jumlahPending ?></span>
            <?php endif; ?>
        </div>
        <div class="nav-links">
            |<a href="hasil_nilai.php">HASIL NILAI</a>|
            <a href="data_karyawan.php">DATA KARYAWAN</a>|
            <a href="../logout.php">LOG OUT</a>|
        </div>
    </div>
</nav>
</header>

<!-- NOTIFIKASI POPUP -->
<div class="notif-popup" id="notifBox">
    <h4>User Menunggu Persetujuan</h4>
    <?php if ($jumlahPending > 0): ?>
        <?php foreach ($pendingUsers as $user): ?>
            <div class="user-item">
                <?= htmlspecialchars($user['nama']) ?> (<?= $user['nik'] ?>)<br>
                <a href="verifikasi_user.php?nik=<?= $user['nik'] ?>">Setujui Sekarang</a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Tidak ada user baru.</p>
    <?php endif; ?>
</div>

<!-- PROFIL MANAGER -->
<div class="profile-container">
    <img src="../../img/wahyu prayogi.png" alt="Foto Profil">
    <h2>Profil Manager</h2>
    <div class="profile-data">
        <p><strong>Nama:</strong> Wahyu Prayogi</p>
        <p><strong>NIK:</strong> 3152000004</p>
        <p><strong>Jenis Kelamin:</strong> Laki-laki</p>
        <p><strong>Role:</strong> Manager</p>
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
<script>
    function toggleNotif() {
        const notifBox = document.getElementById("notifBox");
        notifBox.style.display = notifBox.style.display === "block" ? "none" : "block";
    }

    // Klik di luar notifikasi untuk menutup
    document.addEventListener('click', function(e) {
        const notifBox = document.getElementById("notifBox");
        const notifIcon = document.querySelector(".notif-icon");
        if (!notifBox.contains(e.target) && !notifIcon.contains(e.target)) {
            notifBox.style.display = "none";
        }
    });
</script>
</body>
</html>
