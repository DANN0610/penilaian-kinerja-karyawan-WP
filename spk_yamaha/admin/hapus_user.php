<?php
session_start();
require '../koneksi.php';

if (!isset($_SESSION['nik']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../dealer/login.php");
    exit;
}

if (isset($_GET['nik'])) {
    $nik = $_GET['nik'];

    // Ambil nama sebelum dihapus untuk log
    $stmt = $pdo->prepare("SELECT nama FROM tb_user WHERE nik = ?");
    $stmt->execute([$nik]);
    $user = $stmt->fetch();

    $stmt = $pdo->prepare("DELETE FROM tb_user WHERE nik = ?");
    $stmt->execute([$nik]);

   // Log aktivitas
$log = $pdo->prepare("INSERT INTO log_activity (user, aktivitas, waktu) VALUES (?, ?, NOW())");
$log->execute([$_SESSION['user'], "Menghapus user {$user['nama']} ($nik)"]);

    header("Location: ../admin/data_user.php");
    exit;
}
?>
