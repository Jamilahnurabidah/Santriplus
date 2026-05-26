<?php include 'header.php'; ?>

<div class="section-header">
    <h1 class="page-title">Input Pembayaran Santri</h1>
</div>

<div class="table-container" style="max-width: 700px; margin: 0 auto;">
    <div class="table-header">
        <span><i class="fas fa-edit"></i></span> Form Administrasi
    </div>
    
    <form action="" method="POST" style="padding: 20px;">
        <div class="input-group">
            <label>Nama Santri</label>
            <select name="id_santri" required>
                <option value="">-- Pilih Nama Santri --</option>
                <?php
                $santri = mysqli_query($conn, "SELECT id_santri, nama_lengkap FROM santri");
                while($s = mysqli_fetch_array($santri)){
                    echo "<option value='".$s['id_santri']."'>".$s['nama_lengkap']."</option>";
                }
                ?>
            </select>
        </div>

        <div class="input-group">
            <label>Bulan Tagihan</label>
            <select name="bulan_tagihan" required>
                <?php
                $bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", 
                          "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
                foreach ($bulan as $b) {
                    echo "<option value='$b'>$b</option>";
                }
                ?>
            </select>
        </div>

        <div class="input-group">
            <label>Jumlah Tagihan (Rp)</label>
            <input type="number" name="jumlah_bayar" required placeholder="Contoh: 250000">
        </div>

        <div class="input-group">
            <label>Tanggal Bayar</label>
            <input type="date" name="tanggal_bayar" required value="<?php echo date('Y-m-d'); ?>">
        </div>

        <div class="input-group">
            <label>Status Bayar</label>
            <select name="status_bayar">
                <option value="Lunas">Lunas</option>
                <option value="Belum Lunas">Belum Lunas</option>
                <option value="Cicil">Cicil</option>
            </select>
        </div>

        <div style="margin-top: 20px; display: flex; gap: 10px;">
            <button type="submit" name="simpan" class="btn btn-tambah" style="flex: 2;">
                <i class="fas fa-save"></i> Simpan Data
            </button>
            <a href="administrasi.php" class="btn btn-import" style="flex: 1; text-align: center;">Batal</a>
        </div>
    </form>
</div>

<?php
if (isset($_POST['simpan'])) {
    $id_santri = $_POST['id_santri'];
    $bulan = $_POST['bulan_tagihan'];
    $jumlah = $_POST['jumlah_bayar'];
    $tanggal = $_POST['tanggal_bayar'];
    $status = $_POST['status_bayar'];

    $query = "INSERT INTO administrasi (id_santri, bulan_tagihan, jumlah_bayar, tanggal_bayar, status_bayar) 
              VALUES ('$id_santri', '$bulan', '$jumlah', '$tanggal', '$status')";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data Administrasi Berhasil Disimpan!'); window.location='administrasi.php';</script>";
    } else {
        echo "Ralat: " . mysqli_error($conn);
    }
}
?>

<?php include 'footer.php'; ?>

<style>
    /* Container utama untuk membungkus form */
.table-container {
    background-color: #ffffff;
    border-radius: 12px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
    border-top: 6px solid #2c3e50; /* Aksen Navy sesuai sidebar */
    margin-top: 20px !important;
    overflow: hidden;
}

/* Mengatur baris input agar label dan kotak isi sejajar */
.input-group {
    margin-bottom: 20px;
    display: flex;
    flex-direction: column;
}

.input-group label {
    font-size: 14px;
    font-weight: 600;
    color: #34495e;
    margin-bottom: 8px;
    display: block;
}

/* Styling untuk kotak input, dropdown, dan tanggal */
.input-group input, 
.input-group select {
    width: 100%;
    padding: 12px 15px;
    border: 1px solid #dcdde1;
    border-radius: 8px;
    font-size: 15px;
    background-color: #f9f9f9;
    transition: all 0.3s ease;
    outline: none;
    box-sizing: border-box; /* Memastikan padding tidak merusak lebar */
}

/* Efek saat kotak input diklik (fokus) */
.input-group input:focus, 
.input-group select:focus {
    border-color: #3498db;
    background-color: #ffffff;
    box-shadow: 0 0 8px rgba(52, 152, 219, 0.2);
}

/* Styling Khusus Tombol Simpan */
.btn-tambah {
    background-color: #2ecc71; /* Hijau Segar */
    color: #ffffff;
    border: none;
    border-radius: 8px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    transition: background 0.3s;
}

.btn-tambah:hover {
    background-color: #27ae60;
}

/* Styling Khusus Tombol Batal/Import */
.btn-import {
    background-color: #34495e; /* Abu-abu Gelap/Navy */
    color: #ffffff;
    border: none;
    border-radius: 8px;
    font-weight: 600;
    transition: background 0.3s;
}

.btn-import:hover {
    background-color: #2c3e50;
}

/* Mengatur jarak ikon di dalam tombol */
.btn i {
    margin-right: 8px;
}
</style>

