<?php
require '../../koneksi.php';

// Cek apakah file ini diakses langsung atau di-include
$from_include = debug_backtrace();

// Kosongkan tabel hitung
$pdo->exec("TRUNCATE TABLE hitung");

// Ambil data alternatif
$sql = "SELECT * FROM alternatif";
$stmt = $pdo->query($sql);
$alternatif = $stmt->fetchAll();

// Fungsi konversi ke angka
function konversi($pdo, $kode_kriteria, $deskripsi) {
    $q = $pdo->prepare("SELECT nilai FROM sub_kriteria WHERE kode_kriteria = ? AND deskripsi = ?");
    $q->execute([$kode_kriteria, $deskripsi]);
    $r = $q->fetch();
    return $r ? $r['nilai'] : 0;
}

// Insert ke hitung
foreach ($alternatif as $alt) {
    $pc = konversi($pdo, 'C01', $alt['penilaian_customer']);
    $kd = konversi($pdo, 'C02', $alt['kedisiplinan']);
    $kk = konversi($pdo, 'C03', $alt['kualitas_kerja']);
    $sp = konversi($pdo, 'C04', $alt['sikap_perilaku']);
    $pr = konversi($pdo, 'C05', $alt['penilaian_rekan_kerja']);

    $ins = $pdo->prepare("INSERT INTO hitung (nik, nama, bidang, penilaian_customer, kedisiplinan, kualitas_kerja, sikap_perilaku, penilaian_rekan_kerja)
                          VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $ins->execute([$alt['nik'], $alt['nama'], $alt['bidang'], $pc, $kd, $kk, $sp, $pr]);
}

// Jika diakses langsung, tampilkan pesan
if (empty($from_include)) {
    echo "<h3>Generate selesai. Data tabel <code>hitung</code> sudah siap.</h3>";
    echo "<a href='hasil_nilai.php'>Lihat hasil perhitungan WP</a>";
}
?>
