<?php
require '../../koneksi.php';

$success = "";
$error = "";

// Ambil NIK dari URL
$nik = $_GET['nik'] ?? '';

if (!$nik) {
    die("NIK tidak ditemukan di URL.");
}

// Ambil data karyawan dari DB
$stmt = $pdo->prepare("SELECT * FROM karyawan WHERE nik = ?");
$stmt->execute([$nik]);
$karyawan = $stmt->fetch();

if (!$karyawan) {
    die("Data karyawan tidak ditemukan.");
}

// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $bidang = $_POST['bidang'];
    $jenis_kelamin = $_POST['jenis_kelamin'];

    if (!$nama || !$bidang || !$jenis_kelamin) {
        $error = "Semua field harus diisi.";
    } else {
        try {
            $update = $pdo->prepare("UPDATE karyawan SET nama = ?, bidang = ?, jenis_kelamin = ? WHERE nik = ?");
            $update->execute([$nama, $bidang, $jenis_kelamin, $nik]);
            $success = "Data berhasil diupdate.";
            
            // Refresh data
            $stmt->execute([$nik]);
            $karyawan = $stmt->fetch();
        } catch (PDOException $e) {
            $error = "Gagal update data: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Karyawan</title>
    <link rel="stylesheet" href="../../assets/styles.css">
    <style>
        .form-container {
            max-width: 500px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-container input, .form-container select {
            width: 100%;
            padding: 10px 12px;
            margin: 8px 0 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-container button {
            width: 100%;
            padding: 12px;
            background: #0044cc;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-container button:hover {
            background: #003399;
        }
        .alert {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
        }
        .alert-success {
            background: #d4edda;
            color: #155724;
        }
        .alert-error {
            background: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Edit Karyawan</h2>

    <?php if ($success): ?>
        <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
    <?php elseif ($error): ?>
        <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="post">
        <label>NIK</label>
        <input type="text" name="nik" value="<?= htmlspecialchars($karyawan['nik']) ?>" disabled>

        <label>Nama</label>
        <input type="text" name="nama" value="<?= htmlspecialchars($karyawan['nama']) ?>" required>

        <label>Bidang</label>
        <input type="text" name="bidang" value="<?= htmlspecialchars($karyawan['bidang']) ?>" required>

        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin" required>
            <option value="">-- Pilih --</option>
            <option value="Laki-Laki" <?= $karyawan['jenis_kelamin'] == 'Laki-Laki' ? 'selected' : '' ?>>Laki-Laki</option>
            <option value="Perempuan" <?= $karyawan['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
        </select>

        <button type="submit">Update</button>
    </form>

    <div style="text-align:center; margin-top:15px;">
        <a href="../../dealer/manager/data_karyawan.php">← Kembali ke Data Karyawan</a>
    </div>
</div>

</body>
</html>
