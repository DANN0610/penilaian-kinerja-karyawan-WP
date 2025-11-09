<?php
require '../../koneksi.php';

$success = "";
$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $bidang = $_POST['bidang'];
    $jenis_kelamin = $_POST['jenis_kelamin'];

    // Validasi sederhana
    if (!$nik || !$nama || !$bidang || !$jenis_kelamin) {
        $error = "Semua field harus diisi.";
    } else {
        try {
            $stmt = $pdo->prepare("INSERT INTO karyawan (nik, nama, bidang, jenis_kelamin) VALUES (?, ?, ?, ?)");
            $stmt->execute([$nik, $nama, $bidang, $jenis_kelamin]);
            $success = "Data karyawan berhasil ditambahkan.";
        } catch (PDOException $e) {
            $error = "Gagal menyimpan data: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Karyawan</title>
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
    <h2>Tambah Karyawan</h2>

    <?php if ($success): ?>
        <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
    <?php elseif ($error): ?>
        <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="post">
        <label>NIK</label>
        <input type="text" name="nik" placeholder="Masukkan NIK" required>

        <label>Nama</label>
        <input type="text" name="nama" placeholder="Masukkan Nama" required>

        <label>Bidang</label>
        <input type="text" name="bidang" placeholder="Masukkan Bidang" required>

        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin" required>
            <option value="">-- Pilih Jenis Kelamin --</option>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>

        <button type="submit">Simpan</button>
    </form>

    <div style="text-align:center; margin-top:15px;">
        <a href="../../dealer/manager/data_karyawan.php">← Kembali ke Data Karyawan</a>
    </div>
</div>

</body>
</html>
