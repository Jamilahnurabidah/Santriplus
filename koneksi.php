<?php
// 1. Deteksi otomatis lingkungan server (Railway vs Localhost)
if (getenv('MYSQLHOST')) {
    // Jika online di Railway
    $host = getenv('MYSQLHOST');
    $user = getenv('MYSQLUSER');
    $pass = getenv('MYSQLPASSWORD');
    $db   = getenv('MYSQLDATABASE');
    $port = getenv('MYSQLPORT');
} else {
    // Jika offline di laptop Anda (XAMPP)
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db   = "db_santriplus";
    $port = 3306;
}

// 2. Hubungkan ke database menggunakan variabel port
$conn = mysqli_connect($host, $user, $pass, $db, $port);

// 3. Validasi koneksi
if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>