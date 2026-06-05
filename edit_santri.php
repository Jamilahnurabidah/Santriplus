<?php 
include 'header.php'; // Pastikan koneksi database ada di dalam header.php

// 1. Ambil ID dari URL
$id = $_GET['id'];

// 2. Ambil data santri berdasarkan ID tersebut
$query = mysqli_query($conn, "SELECT * FROM santri WHERE id_santri = '$id'");
$d = mysqli_fetch_array($query);
?>

<div class="section-header">
    <h1 class="page-title">Edit Data Santri</h1>
</div>

<div class="table-container" style="max-width: 600px; margin: auto;">
    <form action="proses_edit.php" method="POST" style="padding: 20px;">
        <!-- Input ID (Sembunyi/Hidden) sebagai kunci utama untuk update -->
        <input type="hidden" name="id_santri" value="<?php echo $d['id_santri']; ?>">

        <div class="input-group">
            <label>NISN</label>
            <input type="text" name="nisn" value="<?php echo $d['nisn']; ?>" required>
        </div>

        <div class="input-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" value="<?php echo $d['nama_lengkap']; ?>" required>
        </div>

        <div class="input-group">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" required>
                <option value="Lelaki" <?php echo ($d['jenis_kelamin'] == 'Lelaki') ? 'selected' : ''; ?>>Lelaki</option>
                <option value="Perempuan" <?php echo ($d['jenis_kelamin'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
            </select>
        </div>

        <div class="input-group">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" style="width: 100%; border-radius: 8px; border: 1px solid #dcdde1; padding: 10px;"><?php echo $d['alamat']; ?></textarea>
        </div>

        <div class="input-group">
            <label>Status</label>
            <select name="status_aktif">
                <option value="aktif" <?php echo ($d['status_aktif'] == 'aktif') ? 'selected' : ''; ?>>Aktif</option>
                <option value="alumni" <?php echo ($d['status_aktif'] == 'alumni') ? 'selected' : ''; ?>>Alumni</option>
            </select>
        </div>

        <button type="submit" class="btn-submit">Update Data Santri</button>
        <a href="data_santri.php" style="display: block; text-align: center; margin-top: 15px; color: #7f8c8d; text-decoration: none;">Batal</a>
    </form>
</div>

<?php include 'footer.php'; ?>
<style>
    /* Container Utama Form Edit */
.table-container {
    background-color: #ffffff;
    border-radius: 12px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
    margin-top: 30px !important;
    border-top: 6px solid #2c3e50; /* Garis atas Navy sesuai sidebar */
    overflow: hidden;
}

/* Judul di dalam Box */
.section-header .page-title {
    color: #2c3e50;
    font-weight: 700;
    margin-bottom: 20px;
    text-align: center;
}

/* Grup Input (Label dan Kotak Isi) */
.input-group {
    margin-bottom: 18px;
    display: flex;
    flex-direction: column;
}

.input-group label {
    font-size: 14px;
    font-weight: 600;
    color: #34495e;
    margin-bottom: 8px;
}

/* Styling Input, Select, dan Textarea */
.input-group input, 
.input-group select, 
.input-group textarea {
    padding: 12px 15px;
    border: 1px solid #dcdde1;
    border-radius: 8px;
    font-size: 15px;
    background-color: #fcfcfc;
    transition: all 0.3s ease;
    outline: none;
}

/* Efek Fokus (Saat kotak diklik) */
.input-group input:focus, 
.input-group select:focus, 
.input-group textarea:focus {
    border-color: #3498db; /* Warna biru cerah */
    background-color: #ffffff;
    box-shadow: 0 0 8px rgba(52, 152, 219, 0.2);
}

/* Tombol Update (Simpan) */
.btn-submit {
    width: 100%;
    background-color: #2ecc71; /* Hijau Segar */
    color: white;
    padding: 14px;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 700;
    cursor: pointer;
    transition: background 0.3s;
    text-transform: uppercase;
    margin-top: 10px;
}

.btn-submit:hover {
    background-color: #27ae60;
}

/* Tombol Batal */
.btn-cancel {
    display: block;
    text-align: center;
    margin-top: 15px;
    color: #95a5a6;
    text-decoration: none;
    font-size: 14px;
}

.btn-cancel:hover {
    color: #e74c3c; /* Berubah merah saat disentuh */
}
</style>