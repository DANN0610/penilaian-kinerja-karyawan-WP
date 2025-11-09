<?php
session_start();
require '../../koneksi.php';

$nik_manager = $_SESSION['nik'] ?? null;
$nik_karyawan = $_GET['nik'] ?? null;

if (!$nik_manager || !$nik_karyawan) {
    header("Location: index.php");
    exit;
}

// ambil data karyawan
$stmt = $pdo->prepare("SELECT nik, nama, bidang FROM karyawan WHERE nik = ?");
$stmt->execute([$nik_karyawan]);
$karyawan = $stmt->fetch();

if (!$karyawan) {
    echo "Karyawan tidak ditemukan!";
    exit;
}

// jika submit form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $C1 = $_POST['C1'];
    $C2 = $_POST['C2'];
    $C3 = $_POST['C3'];

    // ---------- CEK & SIMPAN NILAI_MANAGER ----------
    $cek = $pdo->prepare("SELECT COUNT(*) FROM nilai_manager WHERE nik = ?");
    $cek->execute([$karyawan['nik']]);
    $ada = $cek->fetchColumn();

    if ($ada > 0) {
        // update jika sudah ada
        $upd = $pdo->prepare("UPDATE nilai_manager 
            SET C01 = ?, C02 = ?, C03 = ? 
            WHERE nik = ?");
        $upd->execute([$C1, $C2, $C3, $karyawan['nik']]);
    } else {
        // insert jika belum ada
        $ins = $pdo->prepare("INSERT INTO nilai_manager 
            (nik, nama_karyawan, bidang, C01, C02, C03) 
            VALUES (?, ?, ?, ?, ?, ?)");
        $ins->execute([
            $karyawan['nik'], $karyawan['nama'], $karyawan['bidang'],
            $C1, $C2, $C3
        ]);
    }

    // ---------- CEK & SIMPAN ALTERNATIF ----------
    $cekAlt = $pdo->prepare("SELECT COUNT(*) FROM alternatif WHERE nik = ?");
    $cekAlt->execute([$karyawan['nik']]);
    $adaAlt = $cekAlt->fetchColumn();

    if ($adaAlt > 0) {
        $updAlt = $pdo->prepare("UPDATE alternatif 
            SET kedisiplinan = ?, kualitas_kerja = ?, sikap_perilaku = ? 
            WHERE nik = ?");
        $updAlt->execute([$C1, $C2, $C3, $karyawan['nik']]);
    } else {
        $insAlt = $pdo->prepare("INSERT INTO alternatif 
            (nik, nama, bidang, kedisiplinan, kualitas_kerja, sikap_perilaku)
            VALUES (?, ?, ?, ?, ?, ?)");
        $insAlt->execute([
            $karyawan['nik'], $karyawan['nama'], $karyawan['bidang'],
            $C1, $C2, $C3
        ]);
    }

    header("Location: ../../dealer/manager/data_karyawan.php?success=1");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Penilaian Karyawan</title>
    <link rel="stylesheet" href="../../assets/styles.css">
    <style>
        .container {
            max-width: 600px;
            margin: 40px auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }
        h2 { text-align: center; }
        label { display: block; margin-top: 15px; }
        select, button {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
        }
        button {
            background: #0044cc;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover { background: #003399; }
    </style>
</head>
<body>

<div class="container">
    <h2>Penilaian Karyawan</h2>
    <p><strong>Nama:</strong> <?= htmlspecialchars($karyawan['nama']) ?> (<?= htmlspecialchars($karyawan['bidang']) ?>)</p>

    <form method="POST">
        <?php
        $options = [
            100 => "Sangat Baik",
            80 => "Baik",
            60 => "Biasa Saja",
            40 => "Buruk",
            20 => "Sangat Buruk"
        ];
        ?>

        <label for="C1">Kedisiplinan</label>
        <select name="C1" id="C1" required>
            <option value="">-- Pilih --</option>
            <?php foreach ($options as $nilai => $desc): ?>
                <option value="<?= $nilai ?>"><?= $desc ?></option>
            <?php endforeach; ?>
        </select>

        <label for="C2">Kualitas Kerja</label>
        <select name="C2" id="C2" required>
            <option value="">-- Pilih --</option>
            <?php foreach ($options as $nilai => $desc): ?>
                <option value="<?= $nilai ?>"><?= $desc ?></option>
            <?php endforeach; ?>
        </select>

        <label for="C3">Sikap & Perilaku</label>
        <select name="C3" id="C3" required>
            <option value="">-- Pilih --</option>
            <?php foreach ($options as $nilai => $desc): ?>
                <option value="<?= $nilai ?>"><?= $desc ?></option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Simpan Penilaian</button>
        <a href="../../dealer/manager/data_karyawan.php" 
   style="display:block; text-align:center; margin-top:10px; 
          padding:10px; background:#ccc; color:black; border-radius:5px; text-decoration:none;">
   Kembali
</a>
    </form>
</div>

</body>
</html>
