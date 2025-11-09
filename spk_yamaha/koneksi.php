<?php
$host = 'localhost'; // atau IP server MySQL
$db   = 'spk_penilaian_kinerja'; // ganti dengan nama database kamu
$user = 'root'; // user MySQL kamu
$pass = ''; // password MySQL kamu
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // supaya error dilemparkan exception
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // hasil query array asosiatif
    PDO::ATTR_EMULATE_PREPARES   => false,                  // gunakan prepared statements asli
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // tampilkan pesan error
    echo "Koneksi ke database gagal: " . $e->getMessage();
    exit;
}
?>
