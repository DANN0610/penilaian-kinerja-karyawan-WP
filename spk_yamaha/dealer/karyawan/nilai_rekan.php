<?php
session_start();
require '../../koneksi.php';

$nik_rekan = $_SESSION['nik'] ?? null;
$nik_karyawan = $_GET['nik'] ?? null;

if (!$nik_rekan || !$nik_karyawan) {
    header("Location: index.php");
    exit;
}

// ambil data rekan
$stmt = $pdo->prepare("SELECT nik, nama, bidang FROM karyawan WHERE nik = ?");
$stmt->execute([$nik_rekan]);
$rekan = $stmt->fetch();

// ambil data karyawan yg dinilai
$stmt2 = $pdo->prepare("SELECT nik, nama, bidang FROM karyawan WHERE nik = ?");
$stmt2->execute([$nik_karyawan]);
$karyawan = $stmt2->fetch();

// proses jika submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $C01 = (int)$_POST['C01'];
    $C02 = (int)$_POST['C02'];
    $C03 = (int)$_POST['C03'];
    $C04 = (int)$_POST['C04'];
    $C05 = (int)$_POST['C05'];

    $ins = $pdo->prepare("INSERT INTO nilai_rekan 
        (nik_karyawan, nama_karyawan, bidang_karyawan, nik_rekan, nama_rekan, bidang_rekan, C01, C02, C03, C04, C05)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $ins->execute([
        $karyawan['nik'], $karyawan['nama'], $karyawan['bidang'],
        $rekan['nik'], $rekan['nama'], $rekan['bidang'],
        $C01, $C02, $C03, $C04, $C05
    ]);

    header("Location: ../../dealer/karyawan/data_karyawan.php?success=1");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Nilai Rekan</title>
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
    <h2>Penilaian Rekan Kerja</h2>
    <p><strong>Nama yang dinilai:</strong> <?= htmlspecialchars($karyawan['nama']) ?> (<?= htmlspecialchars($karyawan['bidang']) ?>)</p>

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

        <?php foreach(['C01'=>'Kerja Sama', 'C02'=>'Komunikasi', 'C03'=>'Kedisiplinan', 'C04'=>'Kualitas Kerja', 'C05'=>'Inisiatif'] as $kode=>$label): ?>
            <label for="<?= $kode ?>"><?= $label ?></label>
            <select name="<?= $kode ?>" id="<?= $kode ?>" required>
                <option value="">-- Pilih --</option>
                <?php foreach ($options as $nilai => $desc): ?>
                    <option value="<?= $nilai ?>"><?= $desc ?></option>
                <?php endforeach; ?>
            </select>
        <?php endforeach; ?>

        <button type="submit">Simpan Penilaian</button>
        <a href="../../dealer/karyawan/data_karyawan.php" 
   style="display:block; text-align:center; margin-top:10px; 
          padding:10px; background:#ccc; color:black; border-radius:5px; text-decoration:none;">
   Kembali
</a>
    </form>
</div>

</body>
</html>
