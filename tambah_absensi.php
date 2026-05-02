<?php include 'header.php'; ?>

<div class="section-header">
    <h1 class="page-title">Input Kehadiran</h1>
</div>

<div class="table-container" style="max-width: 600px; margin: auto;">
    <form action="" method="POST" style="padding: 20px;">
        <div class="input-group">
            <label>Tanggal</label>
            <input type="date" name="tanggal" value="<?php echo date('Y-m-d'); ?>" required>
        </div>

        <div class="input-group">
            <label>Nama Santri</label>
            <select name="id_santri" required>
                <option value="">-- Pilih Santri --</option>
                <?php
                $s = mysqli_query($conn, "SELECT * FROM santri");
                while($row = mysqli_fetch_array($s)){
                    echo "<option value='".$row['id_santri']."'>".$row['nama_lengkap']."</option>";
                }
                ?>
            </select>
        </div>

        <div class="input-group">
            <label>Keterangan</label>
            <select name="keterangan" required>
                <option value="Hadir">Hadir</option>
                <option value="Sakit">Sakit</option>
                <option value="Izin">Izin</option>
                <option value="Alpa">Alpa</option>
            </select>
        </div>

        <button type="submit" name="simpan_absensi" class="btn btn-tambah" style="width: 100%;">
            Simpan Absensi
        </button>
    </form>
</div>

<?php
if(isset($_POST['simpan_absensi'])){
    $tgl = $_POST['tanggal'];
    $id_s = $_POST['id_santri'];
    $ket = $_POST['keterangan'];
    $waktu = date('H:i:s'); // Mengambil jam saat ini

    $q = mysqli_query($conn, "INSERT INTO absensi (id_santri, tanggal, waktu_input, keterangan) 
                              VALUES ('$id_s', '$tgl', '$waktu', '$ket')");
    
    if($q){
        echo "<script>alert('Absensi berhasil disimpan!'); window.location='absensi.php';</script>";
    }
}
?>

<?php include 'footer.php'; ?>