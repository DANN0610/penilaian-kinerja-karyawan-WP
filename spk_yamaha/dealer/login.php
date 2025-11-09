<?php
session_start();
require '../koneksi.php'; // koneksi pakai PDO

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nik = $_POST['nik'] ?? '';
    $password = $_POST['password'] ?? '';

    // Ambil user berdasarkan NIK dari tabel tb_user
    $stmt = $pdo->prepare("SELECT * FROM tb_user WHERE nik = ?");
    $stmt->execute([$nik]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
    // Cek password (bandingkan hash MD5)
    if ($user['password'] === md5($password)) {
        // Simpan session
        $_SESSION['nik'] = $user['nik'];
        $_SESSION['nama'] = $user['nama'];
        $_SESSION['role'] = $user['role'];

        // Simpan log aktivitas login
        $namaLogin = $user['nama'];
        $roleLogin = ucfirst($user['role']); 
        $aktivitas = "$roleLogin berhasil login";

        $log = $pdo->prepare("INSERT INTO log_activity (user, aktivitas) VALUES (?, ?)");
        $log->execute([$namaLogin, $aktivitas]);

        // Redirect sesuai role
        if ($user['role'] == 'karyawan') {
            header("Location: ../dealer/karyawan/index.php");
            exit;
        } elseif ($user['role'] == 'manager') {
            header("Location: ../dealer/manager/index.php");
            exit;
        } elseif ($user['role'] == 'admin') {
            header("Location: ../admin/index.php");
            exit;
        } else {
            $error = "Role tidak dikenali.";
        }
    } else {
        $error = "Password salah.";
    }
} else {
    $error = "NIK tidak ditemukan.";
}
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/styles.css">
<style>
body {
    background-color: #007BFF; /* latar belakang biru */
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.login-container {
    max-width: 400px;
    margin: 60px auto;
    padding: 30px;
    background: white;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}
.login-container h2 {
    margin-bottom: 20px;
    text-align: center;
}
.login-container input[type="text"],
.login-container input[type="password"] {
    width: 100%;
    padding: 10px 4px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
}
.login-container button {
    width: 150px;
    padding: 10px;
    background: #0044cc;
    color: white;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    font-size: 1rem;
    display: block;
    margin: 20px auto 0; /* auto untuk center, top 20px, bottom 0 */
}
.login-container button:hover {
    background: #3d4e71;
}
.error {
    color: red;
    margin-top: 10px;
}

.back-button {
    display: inline-block;
    text-align: center;
    width: 50px;
    padding: 10px;
    background: #6c757d; /* abu-abu */
    color: white;
    border-radius: 2px;
    text-decoration: none;
    margin: 0px auto 0;
}
.back-button:hover {
    background: #5a6268;
}
</style>    
</head>
<body>
<div class="login-container">
    <h2>Login</h2>
    <?php if ($error): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <form method="POST">
    <input type="text" name="nik" placeholder="NIK" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Masuk</button>
</form>
<a href="../dealer/index.php" class="back-button">Back</a>
</div>
</body>
</html>
