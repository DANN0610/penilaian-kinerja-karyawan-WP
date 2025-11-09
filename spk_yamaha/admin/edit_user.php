<?php
session_start();
require '../koneksi.php';

// Hanya admin yang boleh akses
if (!isset($_SESSION['nik']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../dealer/login.php");
    exit;
}

// Validasi NIK dari URL
if (!isset($_GET['nik'])) {
    header("Location: ../admin/data_user.php");
    exit;
}

$nik = $_GET['nik'];

// Ambil data user berdasarkan NIK
$stmt = $pdo->prepare("SELECT * FROM tb_user WHERE nik = ?");
$stmt->execute([$nik]);
$user = $stmt->fetch();

// Jika user tidak ditemukan
if (!$user) {
    echo "User dengan NIK $nik tidak ditemukan.";
    exit;
}

// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama   = trim($_POST['nama']);
    $role   = $_POST['role'];
    $bidang = $_POST['bidang'];

    // Ambil nama depan untuk password baru
    $nama_depan = explode(" ", $nama)[0];
    $password   = md5($nama_depan); // password otomatis MD5(nama_depan)

    // Update user
    $stmt = $pdo->prepare("UPDATE tb_user SET nama=?, password=?, role=?, bidang=? WHERE nik=?");
    $stmt->execute([$nama, $password, $role, $bidang, $nik]);

    // Log aktivitas
    $log = $pdo->prepare("INSERT INTO log_activity (user, aktivitas, waktu) VALUES (?, ?, NOW())");
    $log->execute([$_SESSION['nik'], "Menambahkan user {$nama} ($nik)"]);

    header("Location: ../admin/data_user.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f9ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 500px;
        }
        h2 {
            text-align: center;
            color: #007BFF;
            margin-bottom: 25px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 14px;
        }
        button {
            background-color: #007BFF;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
        }
        button:hover {
            background-color: #0056b3;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #007BFF;
            text-decoration: none;
            font-size: 14px;
        }
        a:hover {
            text-decoration: underline;
        }
        .readonly-text {
            background-color: #f1f1f1;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 20px;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit User</h2>
        <form method="POST">
            <label><strong>NIK:</strong></label>
            <div class="readonly-text"><?= htmlspecialchars($user['nik']) ?></div>

            <label>Nama:</label>
            <input type="text" name="nama" value="<?= htmlspecialchars($user['nama']) ?>" required>

            <label>Role:</label>
            <select name="role" required>
                <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                <option value="manager" <?= $user['role'] == 'manager' ? 'selected' : '' ?>>Manager</option>
                <option value="karyawan" <?= $user['role'] == 'karyawan' ? 'selected' : '' ?>>Karyawan</option>
            </select>

            <label>Bidang:</label>
            <input type="text" name="bidang" value="<?= htmlspecialchars($user['bidang']) ?>">

            <button type="submit">Simpan Perubahan</button>
            <a href="../admin/data_user.php">Batal</a>
        </form>
    </div>
</body>
</html>
