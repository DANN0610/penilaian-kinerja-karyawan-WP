<?php
session_start();
require '../koneksi.php';

if (!isset($_SESSION['nik']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../dealer/login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nik     = trim($_POST['nik']);
    $nama    = htmlspecialchars(trim($_POST['nama']));
    $role    = $_POST['role'];
    $bidang  = htmlspecialchars(trim($_POST['bidang']));

    // Validasi input dasar
    if (empty($nik) || empty($nama) || empty($role)) {
        echo "<script>alert('NIK, Nama, dan Role wajib diisi!'); window.location='tambah.php';</script>";
        exit;
    }

    // Jika role karyawan, bidang wajib diisi
    if ($role === 'karyawan' && empty($bidang)) {
        echo "<script>alert('Bidang wajib diisi untuk role karyawan!'); window.location='tambah.php';</script>";
        exit;
    }

    try {
        // Validasi NIK tidak boleh sama
        $cek = $pdo->prepare("SELECT COUNT(*) FROM tb_user WHERE nik = ?");
        $cek->execute([$nik]);
        if ($cek->fetchColumn() > 0) {
            echo "<script>alert('NIK sudah digunakan. Silakan gunakan NIK lain.'); window.location='tambah.php';</script>";
            exit;
        }

        // Ambil nama depan saja → jadi password default
        $namaDepan = strtolower(strtok($nama, " ")); // ambil kata pertama dari nama
        $password  = password_hash($namaDepan, PASSWORD_DEFAULT);

        // Simpan user baru dengan status pending
        $stmt = $pdo->prepare("INSERT INTO tb_user 
            (nik, nama, password, role, bidang, status) 
            VALUES (?, ?, ?, ?, ?, 'pending')");
        $stmt->execute([$nik, $nama, $password, $role, $bidang]);

        // Log aktivitas
        $log = $pdo->prepare("INSERT INTO log_activity (user, aktivitas, waktu) VALUES (?, ?, NOW())");
        $log->execute([$_SESSION['nik'], "Menambahkan user {$nama} ($nik)"]);

        echo "<script>alert('User berhasil ditambahkan. Password default adalah nama depan user.'); window.location='data_user.php';</script>";
        exit;

    } catch (PDOException $e) {
        echo "<script>alert('Terjadi kesalahan: " . addslashes($e->getMessage()) . "'); window.location='tambah.php';</script>";
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah User</title>
    <style>
        body {font-family: Arial, sans-serif; background: #f4f8ff; padding: 40px;}
        h2 {text-align: center; color: #0044cc;}
        form {background: #fff; max-width: 500px; margin: 0 auto; padding: 30px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);}
        label {display: block; margin-bottom: 6px; font-weight: bold;}
        input, select {width: 100%; padding: 10px; margin-bottom: 18px; border: 1px solid #ccc; border-radius: 5px;}
        button, a {padding: 10px 15px; text-decoration: none; border-radius: 5px;}
        button {background-color: #0044cc; color: white; border: none; cursor: pointer;}
        a {background: #ccc; color: black;}
        .form-footer {display: flex; justify-content: space-between;}
    </style>
</head>
<body>
    <h2>Tambah User Baru</h2>
    <form method="POST">
        <label>NIK:</label>
        <input type="text" name="nik" required>

        <label>Nama:</label>
        <input type="text" name="nama" required>

        <label>Role:</label>
        <select name="role" required>
            <option value="">-- Pilih --</option>
            <option value="admin">Admin</option>
            <option value="manager">Manager</option>
            <option value="karyawan">Karyawan</option>
        </select>

        <label>Bidang (isi jika role = karyawan):</label>
        <input type="text" name="bidang">

        <div class="form-footer">
            <button type="submit">Simpan</button>
            <a href="data_user.php">Batal</a>
        </div>
    </form>
</body>
</html>
