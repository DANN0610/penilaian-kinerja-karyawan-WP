<?php
session_start();
require '../koneksi.php';

// Batasi akses hanya untuk admin
if (!isset($_SESSION['nik']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../dealer/login.php");
    exit;
}

// Ambil data user
$query = $pdo->query("SELECT nik, nama, role, bidang FROM tb_user ORDER BY role ASC");
$users = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data User</title>
    <link rel="stylesheet" href="../assets/styles.css">
    <style>
        h2 { text-align: center; margin-bottom: 30px; }
        table { border-collapse: collapse; width: 90%; margin: 0 auto; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: center; }
        th { background-color: #0044cc; color: white; }
        a.btn { text-decoration: none; padding: 5px 10px; border-radius: 4px; }
        .btn-edit { background-color: #28a745; color: white; }
        .btn-delete { background-color: #dc3545; color: white; }
        .btn-added {
        display: block;
        width: fit-content;
        margin-left: auto;
        margin-right: 59px;
        margin-top: 20px;
        margin-bottom: 20px;
        background-color: #007bff;
        color: white;
        padding: 10px 15px;
        border-radius: 5px;
        text-decoration: none;
        }
        .navbar1 {
            display: flex; justify-content: space-between; align-items: center;
            background-color: #0044cc; color: white; padding: 13px 30px;
            margin-bottom: 30px;
        }
        .navbar1 a {
            color: white; text-decoration: none; margin-left: 20px;
        }
    </style>
</head>
<body>

    <nav class="navbar1">
        <div class="title">DATA USER</div>
        <div class="nav-links">
            <a href="index.php">Home</a>
            <a href="../dealer/logout.php">Log Out</a>
        </div>
    </nav>

    <h2>Daftar Pengguna</h2>
    <a href="tambah.php" class="btn-added">+ Tambah User</a>
    <table>
        <thead>
            <tr>
                <th>NIK</th>
                <th>Nama</th>
                <th>Role</th>
                <th>Bidang</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($users): ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user['nik']) ?></td>
                        <td><?= htmlspecialchars($user['nama']) ?></td>
                        <td><?= htmlspecialchars($user['role']) ?></td>
                        <td><?= htmlspecialchars($user['bidang']) ?></td>
                        <td>
                            <a href="edit_user.php?nik=<?= $user['nik'] ?>" class="btn btn-edit">Edit</a>
                            <a href="hapus_user.php?nik=<?= $user['nik'] ?>" class="btn btn-delete" onclick="return confirm('Yakin ingin menghapus user ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="5">Belum ada data user.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>
