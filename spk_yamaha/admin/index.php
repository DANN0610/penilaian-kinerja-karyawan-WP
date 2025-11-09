<?php
session_start();
require '../koneksi.php';

// Cek role admin
if (!isset($_SESSION['nik']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}

$nik = $_SESSION['nik'];

// Ambil nama admin
try {
    $stmt = $pdo->prepare("SELECT nama FROM tb_user WHERE nik = ?");
    $stmt->execute([$nik]);
    $data = $stmt->fetch();

    if (!$data) {
        echo "Data admin tidak ditemukan.";
        exit;
    }

    $namaAdmin = $data['nama'];
} catch (PDOException $e) {
    echo "Terjadi kesalahan: " . $e->getMessage();
    exit;
}

// Ambil log aktivitas
$logQuery = $pdo->query("SELECT * FROM log_activity ORDER BY waktu DESC LIMIT 10");
$logData = $logQuery->fetchAll();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard Admin</title>
  <link rel="stylesheet" href="../assets/styles.css" />
  <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
    }
    .navbar1 {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #0044cc;
        color: white;
        padding: 14px 30px;
        font-size: 1.1rem;
        font-weight: bold;
    }
    .navbar1 a {
        color: white;
        margin-left: 20px;
        text-decoration: none;
        font-weight: normal;
        transition: 0.3s;
    }
    .navbar1 a:hover {
        color: #ffcc00;
    }
    .container {
        display: flex;
        flex-wrap: wrap;
        margin: 30px auto;
        max-width: 1100px;
        gap: 25px;
        padding: 0 15px;
    }
    .profile-container, .log-container {
        flex: 1;
        min-width: 350px;
        background: white;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    .profile-container {
        text-align: center;
    }
    .profile-container img {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 15px;
        border: 3px solid #0044cc;
    }
    .profile-data p {
        font-size: 1rem;
        margin: 8px 0;
        color: #333;
    }
    .profile-data strong {
        color: #0044cc;
    }
    .log-container h3 {
        margin-bottom: 15px;
        font-size: 1.3rem;
        color: #0044cc;
        border-bottom: 2px solid #eee;
        padding-bottom: 8px;
    }
    .log-entry {
        padding: 12px;
        border-left: 4px solid #0044cc;
        background: #f9f9f9;
        margin-bottom: 10px;
        border-radius: 6px;
    }
    .log-entry:last-child {
        margin-bottom: 0;
    }
    .log-entry small {
        display: block;
        color: #666;
        margin-top: 5px;
        font-size: 0.9rem;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar1">
    <div class="title">📊 DASHBOARD ADMIN</div>
    <div class="nav-links">
      <a href="../admin/data_user.php">Data User</a>
      <a href="../dealer/logout.php">Log Out</a>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="container">
    <!-- Profil Admin -->
    <div class="profile-container">
      <img src="../img/prof.png" alt="Foto Profil" />
      <h2><?= htmlspecialchars($namaAdmin); ?></h2>
      <div class="profile-data">
        <p><strong>NIK:</strong> <?= htmlspecialchars($nik); ?></p>
        <p><strong>Jenis Kelamin:</strong> Laki-laki</p> <!-- bisa dinamis -->
        <p><strong>Role:</strong> Admin</p>
      </div>
    </div>

    <!-- Log Aktivitas -->
    <div class="log-container">
      <h3>📝 Log Aktivitas Terbaru</h3>
      <?php if ($logData): ?>
        <?php foreach ($logData as $log): ?>
          <div class="log-entry">
            <p><strong><?= htmlspecialchars($log['aktivitas']) ?></strong></p>
            <small><?= htmlspecialchars($log['waktu']) ?> - oleh <?= htmlspecialchars($log['user']) ?></small>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p>Tidak ada aktivitas tercatat.</p>
      <?php endif; ?>
    </div>
  </div>
<footer>
        <div class="detail">Pematang Kandis, Kec. Bangko,<br>
        Kabupaten Merangin, Jambi 37311<br>
        0811-2710-141</div>
       <div class="logo">
    <img src="../img/logo.png" alt="Logo">
</div>
    </footer>
</body>
</html>
