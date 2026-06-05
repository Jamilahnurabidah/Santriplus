<?php
// 1. Cek status sesi terlebih dahulu agar tidak bentrok di server Vercel

// 2. Hubungkan ke database
include 'koneksi.php';

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SantriPlus</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-logo"><i class="fas fa-graduation-cap"></i> <span>SantriPlus</span></div>
        <div class="menu-section-title">Utama</div>
            <a href="dashboard.php" class="menu-item"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="index.php" class="menu-item"><i class="fas fa-user-graduate"></i> Data Santri</a>
            <a href="administrasi.php" class="menu-item"><i class="fas fa-money-bill-wave"></i> Administrasi</a>
        
        <!-- Menu Utama dengan Dropdown -->
        <div class="menu-item">
            <button class="dropdown-btn" onclick="toggleDropdown()">
                <i class="fas fa-calendar-check"></i> 
                <span>Absensi Santri</span>
                <i class="fas fa-chevron-down arrow-icon"></i>
            </button>
            <div class="dropdown-container" id="dropdownAbsensi">
                <a href="absensi_madin.php">
                    <i class="fas fa-book-open"></i> Presensi Madin
                </a>
                <a href="absensi_sholat.php">
                    <i class="fas fa-mosque"></i> Presensi Sholat
                </a>
            </div>
        </div>
        
        <div class="menu-section-title">Setting</div>
            <a href="logout.php" class="menu-item" style="color: #e74c3c;"><i class="fas fa-sign-out-alt"></i> Keluar</a>
    </div>

    <div class="main-content">
        <header>
            <div class="breadcrumb">ROUDLOTUL ANWAR</div>
            <div class="user-profile">
                <!-- Memperbaiki jalur gambar karena folder SantriPlus sekarang menjadi root utama -->
                <img src="/gambar/logo-pesantren.png" alt="logo Pengurus Pusat">
                <!-- Mengamankan variabel nama admin agar tidak memicu error global -->
                <span><?php echo isset($_SESSION['nama_admin']) ? $_SESSION['nama_admin'] : 'Admin'; ?></span>
            </div>
        </header>
        <div class="content-body">
    
<style>
    .sidebar a:hover{
        /* hover = mengubah warna kotak ketika kursor ada di atasnya */
        background-color: gold;
        color: black;
    }

    .menu-item {
        padding: 0;                         /* Menghilangkan jarak dalam kotak */
        margin: 0;                          /* Menghilangkan jarak luar kotak */
    }

    /* Styling Induk Dropdown */
    .dropdown-container {
        display: none; /* Sembunyi secara default */
        background-color: #2c3e50; /* Warna sedikit lebih gelap dari sidebar */
        padding-left: 20px;
        transition: all 0.3s ease;
    }

    /* Tampilan Link di dalam Dropdown */
    .dropdown-container a {
        padding: 12px 15px;
        text-decoration: none;
        display: block;
        font-size: 14px;
        color: #bdc3c7;
    }

    .dropdown-container a:hover {
        color: gold; /* Warna hijau saat di-hover */
    }

    /* Icon Panah */
    /* Mengatur icon panah dropdown agar tetap di ujung kanan */
    .arrow-icon {
        margin-left: auto; /* Mendorong panah ke paling kanan */
        font-size: 12px;
    }

    /* Putar panah saat aktif */
    .rotate {
        transform: rotate(180deg);
    }

    /* Class untuk menampilkan dropdown via JS */
    .show-dropdown {
        display: block !important;
    }

    /* Menghilangkan garis bawah pada semua link di sidebar */
    .sidebar a, 
    .dropdown-btn {
        display: flex; /* Mengaktifkan mode flexbox */
        align-items: center; /* Menyejajarkan icon dan teks secara vertikal di tengah */
        padding: 12px 20px; /* Samakan padding dengan menu Data Santri */
        text-decoration: none !important;
        color: white !important;
        background: none;
        border: none;
        width: 100%;
        text-align: left;
        font-family: inherit;
        font-size: 16px; /* Samakan ukuran font */
        cursor: pointer;
    }

    /* Mengatur warna icon agar ikut putih */
    /* Mengatur jarak Icon agar sejajar lurus kebawah */
    .sidebar a i, 
    .dropdown-btn i {
        width: 25px; /* Memberikan lebar tetap pada area icon agar teks dimulai dari titik yang sama */
        margin-right: 15px; /* Jarak antara icon dan teks */
        text-align: center;
    }

    /* Styling khusus untuk isi dropdown agar teksnya juga putih */
    .dropdown-container a {
        color: rgba(255, 255, 255, 0.8) !important; /* Putih sedikit transparan agar beda dengan induk */
        padding-left: 50px !important;
        text-decoration: none !important;
    }

    /* Warna saat menu di-hover (opsional agar lebih cantik) */
    .sidebar a:hover, 
    .dropdown-btn:hover {
        background-color: gold;
        color: black !important; /* Berubah hijau saat disentuh kursor */
    }

    .dropdown-btn {
        background: transparent !important; /* Memperbaiki typo 'glob' menjadi 'transparent' */
        border: none !important;
        padding: 12px 20px; /* Samakan dengan padding menu Data Santri */
        display: flex;
        align-items: center;
        width: 100%;
        color: white !important;
        cursor: pointer;
        transition: background 0.3s;
    }
</style>