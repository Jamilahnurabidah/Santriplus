<?php 
include 'header.php'; 

// Mengambil ID dari URL
$id = $_GET['id'];

// Query JOIN untuk mendapatkan nama santri meskipun data di tabel administrasi
$query = mysqli_query($conn, "SELECT administrasi.*, santri.nama_lengkap 
                              FROM administrasi 
                              JOIN santri ON administrasi.id_santri = santri.id_santri 
                              WHERE id_bayar = '$id'");
$d = mysqli_fetch_array($query);
?>

<div class="section-header">
    <h1 class="page-title">Edit Pembayaran: <?php echo $d['nama_lengkap']; ?></h1>
</div>

<div class="table-container" style="max-width: 600px; margin: auto;">
    <form action="proses_edit_administrasi.php" method="POST" style="padding: 20px;">
        <!-- ID Bayar disembunyikan agar bisa digunakan di query UPDATE -->
        <input type="hidden" name="id_bayar" value="<?php echo $d['id_bayar']; ?>">

        <div class="input-group">
            <label>Bulan Tagihan</label>
            <input type="text" name="bulan_tagihan" value="<?php echo $d['bulan_tagihan']; ?>" required>
        </div>

        <div class="input-group">
            <label>Jumlah Bayar (Rp)</label>
            <input type="number" name="jumlah_bayar" value="<?php echo $d['jumlah_bayar']; ?>" required>
        </div>

        <div class="input-group">
            <label>Status Bayar</label>
            <select name="status_bayar">
                <option value="Lunas" <?php echo ($d['status_bayar'] == 'Lunas') ? 'selected' : ''; ?>>Lunas</option>
                <option value="Belum Lunas" <?php echo ($d['status_bayar'] == 'Belum Lunas') ? 'selected' : ''; ?>>Belum Lunas</option>
                <option value="Cicil" <?php echo ($d['status_bayar'] == 'Cicil') ? 'selected' : ''; ?>>Cicil</option>
            </select>
        </div>

        <button type="submit" class="btn-tambah" style="width: 100%; padding: 12px; cursor: pointer;">
            Update Data Pembayaran
        </button>
        <a href="administrasi.php" class="btn-cancel" style="display: block; text-align: center; margin-top: 15px; color: #7f8c8d; text-decoration: none;">Batal</a>
    </form>
</div>

<?php include 'footer.php'; ?>

<style>
/* Container Utama untuk Form Edit */
.table-container {
    background: #ffffff;
    padding: 40px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    border-top: 5px solid #2ecc71; /* Aksen hijau agar terlihat segar */
    margin: 30px auto !important;
}

/* Judul Halaman */
.page-title {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #2c3e50;
    margin-bottom: 30px;
    text-align: center;
    font-weight: 700;
}

/* Penataan Baris Input agar Sejajar (Label Kiri, Input Kanan) */
.input-group {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.input-group label {
    flex: 0 0 180px; /* Lebar label tetap agar rapi */
    font-weight: 600;
    color: #34495e;
    font-size: 15px;
}

/* Styling Box Input, Dropdown, dan Angka */
.input-group input, 
.input-group select {
    flex: 1;
    padding: 12px 15px;
    border: 1.5px solid #e0e0e0;
    border-radius: 8px;
    font-size: 14px;
    color: #2c3e50;
    background-color: #fcfcfc;
    transition: all 0.3s ease;
}

/* Efek saat Input diklik */
.input-group input:focus, 
.input-group select:focus {
    border-color: #14056b;
    background-color: #ffffff;
    box-shadow: 0 0 10px rgba(46, 204, 113, 0.15);
    outline: none;
}

/* Tombol Update */
.btn-tambah {
    width: 100%;
    padding: 14px;
    background-color: #2ecc71;
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 700;
    cursor: pointer;
    transition: background 0.3s ease;
    margin-top: 10px;
}

.btn-tambah:hover {
    background-color: #27ae60;
}

/* Tombol Batal */
.btn-cancel {
    display: block;
    text-align: center;
    margin-top: 15px;
    color: #95a5a6;
    text-decoration: none;
    font-weight: 500;
    font-size: 14px;
    transition: color 0.3s;
}

.btn-cancel:hover {
    color: #e74c3c; /* Berubah merah saat di-hover */
}
</style>