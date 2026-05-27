<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'koneksi.php';
include 'header.php'; 
?>

<div class="welcome-banner" style="background: linear-gradient(135deg, #2c3e50, #4ca1af); color: white; padding: 15px 25px; border-radius: 12px; margin-bottom: 30px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); overflow: hidden;">
    <marquee behavior="scroll" direction="left" scrollamount="6" style="font-size: 20px; font-weight: 600;">
        Selamat Datang Di Aplikasi Sistem Informasi Management - Pondok Pesantren Roudlotul Anwar
    </marquee>
</div>

<div class="dashboard-cards" style="display: flex; gap: 20px; margin-bottom: 30px;">
    
    <div class="card" style="flex: 1; background: white; border-radius: 12px; padding: 20px; border-top: 5px solid #3498db; box-shadow: 0 6px 12px rgba(0,0,0,0.05); display: flex; justify-content: space-between; align-items: center;">
        <div>
            <h4 style="margin: 0; color: #7f8c8d; font-size: 14px; text-transform: uppercase;">Total Santri</h4>
            <h2 style="margin: 10px 0; font-size: 36px; color: #2c3e50;">
                <?php echo mysqli_num_rows(mysqli_query($conn, "SELECT * FROM santri")); ?>
            </h2>
            <div style="font-size: 12px; color: #95a5a6;">Aktif di sistem</div>
        </div>
        <i class="fas fa-user-graduate" style="font-size: 40px; color: #3498db; opacity: 0.2;"></i>
    </div>

    <div class="card" style="flex: 1; background: white; border-radius: 12px; padding: 20px; border-top: 5px solid #3f51b5; box-shadow: 0 6px 12px rgba(0,0,0,0.05); display: flex; justify-content: space-between; align-items: center;">
        <div>
            <h4 style="margin: 0; color: #7f8c8d; font-size: 14px; text-transform: uppercase;">Absensi Hari Ini</h4>
            <h2 style="margin: 10px 0; font-size: 36px; color: #2c3e50;">
                <?php 
                $tgl = date('Y-m-d');
                echo mysqli_num_rows(mysqli_query($conn, "SELECT * FROM absensi WHERE tanggal='$tgl'")); 
                ?>
            </h2>
            <div style="font-size: 12px; color: #95a5a6;"><?php echo date('d M Y'); ?></div>
        </div>
        <i class="fas fa-clipboard-check" style="font-size: 40px; color: #3f51b5; opacity: 0.2;"></i>
    </div>

    <div class="card" style="flex: 1; background: white; border-radius: 12px; padding: 20px; border-top: 5px solid #1a237e; box-shadow: 0 6px 12px rgba(0,0,0,0.05); display: flex; justify-content: space-between; align-items: center;">
        <div>
            <h4 style="margin: 0; color: #7f8c8d; font-size: 14px; text-transform: uppercase;">Administrasi</h4>
            <h2 style="margin: 10px 0; font-size: 36px; color: #2c3e50;">
                 <?php echo mysqli_num_rows(mysqli_query($conn, "SELECT * FROM administrasi")); ?>
            </h2>
            <div style="font-size: 12px; color: #95a5a6;">Catatan transaksi</div>
        </div>
        <i class="fas fa-hand-holding-usd" style="font-size: 40px; color: #1a237e; opacity: 0.2;"></i>
    </div>

</div>

<div style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 6px 12px rgba(0,0,0,0.05);">
    <div style="background: #2c3e50; color: white; padding: 15px 20px; font-weight: 500; display: flex; justify-content: space-between; align-items: center;">
        <span>Data Santri Terbaru</span>
        <a href="data_santri.php" style="color: #3498db; font-size: 12px; text-decoration: none;">Lihat Semua</a>
    </div>
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background: #f8f9fa; border-bottom: 1px solid #eee;">
                <th style="padding: 15px; text-align: left; color: #7f8c8d; font-size: 13px;">NAMA SANTRI</th>
                <th style="padding: 15px; text-align: left; color: #7f8c8d; font-size: 13px;">GENDER</th>
                <th style="padding: 15px; text-align: left; color: #7f8c8d; font-size: 13px;">ALAMAT</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $res = mysqli_query($conn, "SELECT * FROM santri ORDER BY id_santri DESC LIMIT 5");
            while($row = mysqli_fetch_array($res)){
            ?>
            <tr style="border-bottom: 1px solid #f1f1f1;">
                <td style="padding: 15px; font-weight: 500; color: #333;"><?php echo $row['nama_lengkap']; ?></td>
                <td style="padding: 15px; color: #666;"><?php echo $row['jenis_kelamin']; ?></td>
                <td style="padding: 15px; color: #666; font-size: 13px;"><?php echo $row['alamat']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
