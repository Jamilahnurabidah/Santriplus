<?php include 'header.php'; ?>

<div class="section-header">
    <h1 class="page-title">Data Presensi Madin</h1>
    <div class="action-buttons">
        <a href="tambah_absensi_madin.php" class="btn btn-tambah">
            <i class="fas fa-plus"></i> Tambah Presensi
        </a>
    </div>
</div>

<div class="table-container">
    <div class="table-header">
        <span><i class="fas fa-money-check-alt"></i></span> Daftar Kehadiran santri
    </div>
    <table class="table-santri">
        <thead>
            <tr>
                <th>NO</th>
                <th>NAMA SANTRI</th>
                <th>KELAS</th>
                <th>TANGGAL</th>
                <th>KETERANGAN</th>
                <th style="text-align: center;">AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            $query = mysqli_query($conn, "SELECT absensi.*, santri.nama_lengkap 
                                          FROM absensi JOIN santri ON absensi.id_santri = santri.id_santri  WHERE kategori = 'madin' 
                                          ORDER BY tanggal DESC");
                    while($d = mysqli_fetch_array($query)) { 
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['nama_lengkap']; ?></td>
                            <td><?php echo $d['keterangan_jadwal']; ?></td>
                            <td><?php echo date('d-m-Y', strtotime($d['tanggal'])); ?></td>
                            <td><?php echo $d['keterangan']; ?></td>
                            <td style="text-align: center;">
                                <a href="edit_absensi.php?id=<?php echo $d['id_absensi']; ?>" style="color: blue; font-size: 18px; margin-right: 10px;">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="hapus_absensi.php?id=<?php echo $d['id_absensi']; ?>" style="color: blue; font-size: 18px;" onclick="return confirm('Hapus data ini?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>