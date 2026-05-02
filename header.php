<?php
session_start();
include 'koneksi.php';
if($_SESSION['status'] != "login"){
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SantriPlus</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-logo"><i class="fas fa-graduation-cap"></i> <span>SantriPlus</span></div>
        <div class="menu-section-title">Utama</div>
            <a href="dashboard.php" class="menu-item"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="index.php" class="menu-item"><i class="fas fa-user-graduate"></i> Data Santri</a>
            <a href="administrasi.php" class="menu-item"><i class="fas fa-money-bill-wave"></i> Administrasi</a>
            <a href="absensi.php" class="menu-item">
            <span><i class="fas fa-calendar-check"></i></span> Absensi Santri</a>
        <div class="menu-section-title">Setting</div>
            <a href="logout.php" class="menu-item" style="color: #e74c3c;"><i class="fas fa-sign-out-alt"></i> Keluar</a>
        
    </div>
    <div class="main-content">
        <header>
            <div class="breadcrumb">ROUDLOTUL ANWAR</div>
            <div class="user-profile">
                <img src="SantriPlus/gambar/logo-pesantren" alt="logo">
                <span><?php echo $_SESSION['nama_admin']; ?></span>
            </div>
        </header>
        <div class="content-body">
            