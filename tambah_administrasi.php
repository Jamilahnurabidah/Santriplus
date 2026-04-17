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

