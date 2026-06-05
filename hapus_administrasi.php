<?php
include 'koneksi.php'; // Pastikan koneksi database sudah benar

// 1. Ambil ID dari URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // 2. Jalankan perintah hapus berdasarkan id_bayar
    // Sesuaikan nama tabel 'administrasi' dengan yang ada di phpMyAdmin Anda
    $query = mysqli_query($conn, "DELETE FROM administrasi WHERE id_bayar = '$id'");

    if ($query) {
        // Jika berhasil, kembali ke halaman administrasi
        header("location:administrasi.php?pesan=hapus_berhasil");
    } else {
        // Jika gagal, tampilkan pesan error database
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
} else {
    // Jika ID tidak ditemukan, kembali ke halaman utama
    header("location:administrasi.php");
}
?>