<?php
include 'koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($conn, "DELETE FROM absensi WHERE id_absensi='$id'");

if($query){
    header("location:absensi.php"); // Kembali ke halaman data
} else {
    echo "Gagal menghapus data.";
}

?>