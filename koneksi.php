<?php
// 1. Cek apakah aplikasi berjalan di server Railway (Online)
if (getenv('MYSQLHOST')) {
    $host = getenv('MYSQLHOST');
    $user = getenv('MYSQLUSER');
    $pass = getenv('MYSQLPASSWORD');
    $db   = getenv('MYSQLDATABASE');
    $port = getenv('MYSQLPORT');
} else {
    // 2. Jika di laptop / localhost (Offline)
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db   = "db_santriplus";
    $port = 3306;
}

// 3. Jalankan koneksi dengan menyertakan variabel $port
$conn = mysqli_connect($host, $user, $pass, $db, $port);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>