<?php
$host = "kodama.proxy.rlwy.net";
$user = "root";
$pass = "EeQSTMXGJOZuDvrTZLspUMOoISHaKQHV";
$db   = "railway";
$port = 19303;

$conn = mysqli_connect($host, $user, $pass, $db, $port);

// Validasi koneksi
if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>