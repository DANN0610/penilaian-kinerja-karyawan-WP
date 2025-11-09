<?php
require 'koneksi.php';

function klasifikasi($nilai) {
    if ($nilai >= 100) return "Sangat Baik";
    elseif ($nilai >= 80) return "Baik";
    elseif ($nilai >= 60) return "Biasa Saja";
    elseif ($nilai >= 40) return "Buruk";
    else return "Sangat Buruk";
}

$options = [
    100 => "Sangat Baik",
    80 => "Baik",
    60 => "Biasa Saja",
    40 => "Buruk",
    20 => "Sangat Buruk"
];

$pembelians = $pdo->query("SELECT * FROM pembelian ORDER BY invoice_no DESC")->fetchAll();
$selected_data = null;
$karyawans = [];

if (isset($_GET['id_pembelian'])) {
    $id_pembelian = $_GET['id_pembelian'];

    $stmt = $pdo->prepare("SELECT * FROM pembelian WHERE id = ?");
    $stmt->execute([$id_pembelian]);
    $selected_data = $stmt->fetch();

    $niks = array_filter([
        $selected_data['nik_sales_counter'],
        $selected_data['nik_sales_lapangan'],
        $selected_data['nik_driver']
    ]);

    if (!empty($niks)) {
        $placeholders = implode(',', array_fill(0, count($niks), '?'));
        $stmt = $pdo->prepare("SELECT * FROM karyawan WHERE nik IN ($placeholders)");
        $stmt->execute($niks);
        $karyawans = $stmt->fetchAll();
    }
}

if (isset($_POST['submit_penilaian'])) {
    $id = $_POST['id_pembelian'];
    $nama_customer = $_POST['nama_customer'];

    foreach ($_POST['nilai'] as $nik => $nilai) {
        $nilaiAngka = (int)$nilai;
        $nilaiVerbal = klasifikasi($nilaiAngka);

        $stmt = $pdo->prepare("SELECT * FROM karyawan WHERE nik = ?");
        $stmt->execute([$nik]);
        $kar = $stmt->fetch();

        // Inisialisasi nilai semua C ke 0
        $C01 = $C02 = $C03 = $C04 = $C05 = 0;

        // Set nilai berdasarkan bidang
        switch ($kar['bidang']) {
            case 'Sales Lapangan':
                $C01 = $nilaiAngka;
                $C02 = $nilaiAngka;
                break;
            case 'Sales Counter':
                $C03 = $nilaiAngka;
                $C04 = $nilaiAngka;
                break;
            case 'Driver':
                $C05 = $nilaiAngka;
                break;
        }

        // === UPSERT ke nilai_cus ===
        $stmt = $pdo->prepare("
            INSERT INTO nilai_cus 
                (id, nama_customer, nama_karyawan, bidang, C01, C02, C03, C04, C05) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
            ON DUPLICATE KEY UPDATE
                nama_customer = VALUES(nama_customer),
                nama_karyawan = VALUES(nama_karyawan),
                bidang = VALUES(bidang),
                C01 = VALUES(C01),
                C02 = VALUES(C02),
                C03 = VALUES(C03),
                C04 = VALUES(C04),
                C05 = VALUES(C05)
        ");
        $stmt->execute([
            $id, $nama_customer, $kar['nama'], $kar['bidang'],
            $C01, $C02, $C03, $C04, $C05
        ]);

        // === UPSERT ke alternatif ===
        $stmt = $pdo->prepare("
            INSERT INTO alternatif (nik, nama, bidang, penilaian_customer)
            VALUES (?, ?, ?, ?)
            ON DUPLICATE KEY UPDATE
                nama = VALUES(nama),
                bidang = VALUES(bidang),
                penilaian_customer = VALUES(penilaian_customer)
        ");
        $stmt->execute([$nik, $kar['nama'], $kar['bidang'], $nilaiVerbal]);
    }

    echo "<script>alert('Penilaian berhasil disimpan!');location.href='pembelian.php';</script>";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Penilaian Customer</title>
    <style>
        body {
            font-family: sans-serif;
            background: #f0f0f0;
            padding: 20px;
        }
        .container {
            width: 600px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }
        select, button {
            padding: 10px;
            width: 100%;
            margin-top: 10px;
        }
        label {
            margin-top: 10px;
            display: block;
            font-weight: bold;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .rating-row {
            margin-bottom: 15px;
        }
        .submit-btn {
            background: #007bff;
            color: white;
            border: none;
            margin-top: 15px;
        }
        .submit-btn:hover {
            background: #0056b3;
        }
        .back-btn {
            display: inline-block;
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
        }
        .back-btn:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Penilaian Customer</h2>

    <form method="GET">
        <label for="id_pembelian">Pilih Invoice:</label>
        <select name="id_pembelian" onchange="this.form.submit()" required>
            <option value="">-- Pilih Invoice --</option>
            <?php foreach ($pembelians as $p): ?>
                <option value="<?= $p['id']; ?>" <?= isset($selected_data) && $p['id'] == $selected_data['id'] ? 'selected' : '' ?>>
                    <?= $p['tanggal']; ?> - <?= $p['invoice_no']; ?> (<?= $p['nama_customer']; ?>)
                </option>
            <?php endforeach; ?>
        </select>
    </form>

    <?php if ($selected_data): ?>
        <form method="POST">
            <input type="hidden" name="id_pembelian" value="<?= $selected_data['id']; ?>">
            <input type="hidden" name="nama_customer" value="<?= $selected_data['nama_customer']; ?>">

            <?php foreach ($karyawans as $kar): ?>
                <div class="rating-row">
                    <label><?= $kar['nama']; ?> (<?= $kar['bidang']; ?>)</label>
                    <select name="nilai[<?= $kar['nik']; ?>]" required>
                        <option value="">-- Pilih Penilaian --</option>
                        <?php foreach ($options as $angka => $label): ?>
                            <option value="<?= $angka; ?>"><?= $label; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            <?php endforeach; ?>

            <button type="submit" name="submit_penilaian" class="submit-btn">Simpan Penilaian</button>
        </form>
    <?php endif; ?>

    <a href="index.php" class="back-btn">← Kembali</a>
</div>
</body>
</html>
