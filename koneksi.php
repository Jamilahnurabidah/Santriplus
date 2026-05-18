<?php
// 1. Cek apakah aplikasi sedang berjalan di server online (Railway)
if (getenv('MYSQLHOST')) {
    // JIKA ONLINE: Gunakan data database Railway
    $host = getenv('MYSQLHOST');
    $user = getenv('MYSQLUSER');
    $pass = getenv('MYSQLPASSWORD');
    $db   = getenv('MYSQLDATABASE');
    $port = getenv('MYSQLPORT');
} else {
    // JIKA OFFLINE (LOCALHOST): Gunakan data XAMPP laptop Anda
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db   = "db_santriplus";
    $port = 3306; // Port bawaan MySQL XAMPP
}

// 2. Jalankan koneksi menggunakan data yang terpilih di atas
$conn = mysqli_connect($host, $user, $pass, $db, $port);

// 3. Cek kondisi koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>