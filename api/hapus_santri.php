<?php
include 'koneksi.php'; // Pastikan nama file koneksi Anda benar

$id = $_GET['id'];
$query = mysqli_query($conn, "DELETE FROM santri WHERE id_santri='$id'");

if($query){
    header("location:index.php?pesan=hapus"); // Kembali ke halaman data
} else {
    echo "Gagal menghapus data.";
}
?>