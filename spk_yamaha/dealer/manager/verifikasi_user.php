<?php
session_start();
require '../../koneksi.php';

// Cek apakah user yang login adalah manager
if (!isset($_SESSION['nik']) || $_SESSION['role'] !== 'manager') {
    header("Location: ../login.php");
    exit;
}

// Cek apakah ada parameter nik yang dikirim untuk diverifikasi
if (isset($_GET['nik'])) {
    $nik = $_GET['nik'];

    // Update status user menjadi 'aktif'
    $stmt = $pdo->prepare("UPDATE tb_user SET status = 'aktif' WHERE nik = ?");
    $stmt->execute([$nik]);

    // Redirect kembali ke halaman manager
    header("Location: index.php");
    exit;
} else {
    // Jika nik tidak ada, kembali ke halaman manager
    header("Location: index.php");
    exit;
}
