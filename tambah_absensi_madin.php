<?php include 'header.php'; ?>

<div class="section-header">
    <h1 class="page-title">Input Presensi santri</h1>
</div>    
        <!-- Judul Halaman -->
        <div class="table-container" style="max-width: 700px; margin: 0 auto;">
            <div class="table-header">
                <span><i class="fas fa-edit"></i></span> Tambah Presensi Madin
            </div>

        <!-- Form Tambah Data dalam Kartu -->
        <div class="data-card" style="background: #ffffff; padding: 30px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
            <form action="absensi_madin.php" method="POST">
                
                <!-- Input Nama Santri -->
                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-weight: bold; margin-bottom: 8px;">Nama Santri</label>
                    <select name="id_santri" required style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px;">
                        <option value="">-- Pilih Santri --</option>
                        <?php
                        $santri = mysqli_query($conn, "SELECT id_santri, nama_lengkap FROM santri ORDER BY nama_lengkap ASC");
                        while($s = mysqli_fetch_array($santri)){
                            echo "<option value='$s[id_santri]'>$s[nama_lengkap]</option>";
                        }
                        ?>
                    </select>
                </div>

                <!-- Input Kelas (1-5 sesuai data madin Anda) -->
                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-weight: bold; margin-bottom: 8px;">Kelas Madin</label>
                    <select name="keterangan_jadwal" required style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px;">
                        <option value="Kelas 1">Kelas 1</option>
                        <option value="Kelas 2">Kelas 2</option>
                        <option value="Kelas 3">Kelas 3</option>
                        <option value="Kelas 4">Kelas 4</option>
                        <option value="Kelas 5">Kelas 5</option>
                    </select>
                </div>

                <!-- Input Tanggal -->
                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-weight: bold; margin-bottom: 8px;">Tanggal</label>
                    <input type="date" name="tanggal" value="<?php echo date('Y-m-d'); ?>" required style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px;">
                </div>

                <!-- Input Keterangan -->
                <div style="margin-bottom: 25px;">
                    <label style="display: block; font-weight: bold; margin-bottom: 8px;">Keterangan</label>
                    <div style="display: flex; gap: 20px;">
                        <label><input type="radio" name="keterangan" value="hadir" checked> Hadir</label>
                        <label><input type="radio" name="keterangan" value="izin"> Izin</label>
                        <label><input type="radio" name="keterangan" value="sakit"> Sakit</label>
                        <label><input type="radio" name="keterangan" value="alfa"> Alfa</label>
                    </div>
                </div>

                <!-- Tombol Simpan & Kembali -->
                <div style="display: flex; gap: 10px;">
                    <button type="submit" name="simpan" style="background-color: #27ae60; color: white; padding: 12px 25px; border: none; border-radius: 8px; font-weight: bold; cursor: pointer;">
                        <i class="fas fa-save"></i> Simpan Data
                    </button>
                    <a href="absensi_madin.php" style="background-color: #95a5a6; color: white; padding: 12px 25px; border-radius: 8px; text-decoration: none; font-weight: bold;">
                        Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

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
