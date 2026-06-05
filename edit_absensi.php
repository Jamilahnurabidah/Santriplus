<?php 
include 'header.php'; 

// Mengambil ID dari URL
$id = $_GET['id'];

// Query JOIN untuk mendapatkan data absensi dan nama santri secara detail
$query = mysqli_query($conn, "SELECT absensi.*, santri.nama_lengkap 
                              FROM absensi 
                              JOIN santri ON absensi.id_santri = santri.id_santri 
                              WHERE id_absensi = '$id'");
$d = mysqli_fetch_array($query);
?>

<!-- Judul di luar card sesuai gambar -->
<h1 class="page-title">Edit Kehadiran: <?php echo $d['nama_lengkap']; ?></h1>

<div class="table-container">
    <form action="proses_edit_absensi.php" method="POST">
        <!-- Input hidden untuk membawa ID saat update -->
        <input type="hidden" name="id_absensi" value="<?php echo $d['id_absensi']; ?>">

        <div class="input-group">
            <label>Tanggal</label>
            <input type="date" name="tanggal" value="<?php echo $d['tanggal']; ?>" required>
        </div>

        <div class="input-group">
            <label>Keterangan</label>
            <select name="keterangan" required>
                <option value="Hadir" <?php echo ($d['keterangan'] == 'Hadir') ? 'selected' : ''; ?>>Hadir</option>
                <option value="Izin" <?php echo ($d['keterangan'] == 'Izin') ? 'selected' : ''; ?>>Izin</option>
                <option value="Sakit" <?php echo ($d['keterangan'] == 'Sakit') ? 'selected' : ''; ?>>Sakit</option>
                <option value="Alpa" <?php echo ($d['keterangan'] == 'Alpa') ? 'selected' : ''; ?>>Alpa</option>
            </select>
        </div>

        <!-- Tombol Utama Hijau -->
        <button type="submit" class="btn-update">Simpan Perubahan</button>
        
        <!-- Link Batal di bawah -->
        <a href="absensi.php" class="btn-batal-link">Batal</a>
    </form>
</div>
<style>
    /* Container Utama (Card) */
.table-container {
    background: #ffffff;
    padding: 50px 60px;
    border-radius: 20px;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.05);
    border-top: 8px solid #2d0d97; /* Garis hijau tebal di atas */
    max-width: 700px;
    margin: 40px auto !important;
}

/* Judul Halaman */
.page-title {
    font-family: 'Inter', sans-serif;
    color: #2c3e50;
    font-size: 28px;
    font-weight: 800;
    margin-bottom: 30px;
}

/* Penataan Baris (Label & Input) */
.input-group {
    display: flex;
    align-items: center;
    margin-bottom: 25px;
}

.input-group label {
    flex: 0 0 220px; /* Lebar label agar sejajar */
    font-weight: 600;
    color: #34495e;
    font-size: 16px;
}

/* Kotak Input dan Dropdown */
.input-group input, 
.input-group select {
    flex: 1;
    padding: 14px 18px;
    border: 1.5px solid #dcdde1;
    border-radius: 12px;
    font-size: 15px;
    color: #2c3e50;
    background-color: #ffffff;
    transition: all 0.3s ease;
    outline: none;
}

.input-group input:focus, 
.input-group select:focus {
    border-color: #2ecc71;
    box-shadow: 0 0 0 4px rgba(46, 204, 113, 0.1);
}

/* Tombol Simpan Perubahan */
.btn-update {
    width: 100%;
    padding: 16px;
    background-color: #2ecc71;
    color: white;
    border: none;
    border-radius: 12px;
    font-size: 17px;
    font-weight: 700;
    cursor: pointer;
    margin-top: 15px;
    transition: background 0.3s;
}

.btn-update:hover {
    background-color: #27ae60;
}

/* Link Batal */
.btn-batal-link {
    display: block;
    text-align: center;
    margin-top: 20px;
    color: #7f8c8d;
    text-decoration: none;
    font-weight: 500;
    font-size: 15px;
}

.btn-batal-link:hover {
    color: #34495e;
    text-decoration: underline;
}
</style>

<?php include 'footer.php'; ?>