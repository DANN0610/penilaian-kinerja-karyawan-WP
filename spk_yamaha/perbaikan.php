<?php
require 'koneksi.php';

// Ambil data perbaikan untuk dropdown
$perbaikans = $pdo->query("SELECT * FROM perbaikan ORDER BY tanggal DESC")->fetchAll();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_perbaikan = $_POST['id_perbaikan'];
    $C01 = (int)$_POST['C01'];
    $C02 = (int)$_POST['C02'];
    $C03 = (int)$_POST['C03'];
    $C04 = (int)$_POST['C04'];
    $C05 = (int)$_POST['C05'];

    // Ambil data perbaikan
    $stmt = $pdo->prepare("SELECT * FROM perbaikan WHERE id = ?");
    $stmt->execute([$id_perbaikan]);
    $data = $stmt->fetch();

    if (!$data) {
        echo "Data perbaikan tidak ditemukan.";
        exit;
    }

    // Ambil data karyawan dari nik_mekanik dan nik_service_counter
    $stmt = $pdo->prepare("SELECT * FROM karyawan WHERE nik IN (?, ?)");
    $stmt->execute([$data['nik_mekanik'], $data['nik_service_counter']]);
    $karyawans = $stmt->fetchAll();

    // Fungsi klasifikasi
    function klasifikasi($nilai) {
        if ($nilai >= 90) return "Sangat Baik";
        elseif ($nilai >= 75) return "Baik";
        elseif ($nilai >= 60) return "Biasa Saja";
        elseif ($nilai >= 45) return "Buruk";
        else return "Sangat Buruk";
    }

    foreach ($karyawans as $kar) {
        $bidang = strtolower($kar['bidang']);
        $nilai1 = $nilai2 = 0;

        if ($bidang == 'mekanik') {
            $nilai1 = $C01;
            $nilai2 = $C02;
        } elseif ($bidang == 'service counter') {
            $nilai1 = $C03;
            $nilai2 = $C04;
        } elseif ($bidang == 'ob' || $bidang == 'og') {
            $nilai1 = $C05;
            $nilai2 = $C05;
        } else {
            continue; // lewati jika bukan bidang yang dikenali
        }

        $avg = ($nilai1 + $nilai2) / 2;
        $klas = klasifikasi($avg);

        // === UPSERT ke nilai_cus ===
        $stmt = $pdo->prepare("
            INSERT INTO nilai_cus (id, nama_customer, nama_karyawan, bidang, C01, C02, C03, C04, C05) 
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
            $id_perbaikan,
            $data['nama_customer'],
            $kar['nama'],
            $kar['bidang'],
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
        $stmt->execute([
            $kar['nik'],
            $kar['nama'],
            $kar['bidang'],
            $klas
        ]);
    }

    echo "<script>alert('Penilaian customer berhasil disimpan.'); location.href='perbaikan.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Penilaian Customer</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #0044cc;
        }
        .box {
            background: #fff;
            padding: 20px;
            width: 500px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        select, button {
            padding: 10px;
            width: 100%;
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        button {
            background-color:#0044cc;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        option {
            padding: 10px;
        }
        .back-button {
            display: inline-block;
            text-align: center;
            width: 50px;
            padding: 10px;
            background: #6c757d;
            color: white;
            border-radius: 2px;
            text-decoration: none;
            margin: 0 auto;
        }
        .back-button:hover {
            background: #5a6268;
        }
    </style>
</head>
<body>
    <h2>Penilaian Customer Berdasarkan Data Perbaikan</h2>
    <div class="box">
        <form method="POST">
            <label for="id_perbaikan">Pilih Tanggal & Plat Nomor:</label>
            <select name="id_perbaikan" id="id_perbaikan" required>
                <option value="">-- Pilih --</option>
                <?php foreach ($perbaikans as $p): ?>
                    <option value="<?= $p['id']; ?>">
                        <?= $p['tanggal']; ?> - <?= $p['plate_no']; ?> (<?= $p['nama_customer']; ?>)
                    </option>
                <?php endforeach; ?>
            </select>

            <?php
            $options = [
                100 => "Sangat Baik",
                80 => "Baik",
                60 => "Biasa Saja",
                40 => "Buruk",
                20 => "Sangat Buruk"
            ];

            $kriteria = [
                'C01' => 'Kerja Sama (Mekanik)',
                'C02' => 'Komunikasi (Mekanik)',
                'C03' => 'Kedisiplinan (Service Counter)',
                'C04' => 'Kualitas Kerja (Service Counter)',
                'C05' => 'Inisiatif (OB/OG)'
            ];
            ?>

            <?php foreach ($kriteria as $kode => $label): ?>
                <label for="<?= $kode ?>"><?= $label ?>:</label>
                <select name="<?= $kode ?>" id="<?= $kode ?>" required>
                    <option value="">-- Pilih --</option>
                    <?php foreach ($options as $val => $desc): ?>
                        <option value="<?= $val ?>"><?= $desc ?></option>
                    <?php endforeach; ?>
                </select>
            <?php endforeach; ?>

            <button type="submit">Simpan Penilaian</button>
        </form>
        <br>
        <a href="index.php" class="back-button">Back</a>
    </div>
</body>
</html>
