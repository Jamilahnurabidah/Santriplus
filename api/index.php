<?php
include 'header.php';
?>
<div class="section-header">
    <h1 class="page-title">Data Santri</h1>
    <div class="action-buttons">
        <a href="tambah_santri.php" class="btn btn-tambah"><i class="fas fa-user-plus"></i> Tambah Santri</a>
    </div>
</div>

<div class="table-container">
    <table class="table-santri">
        <thead>
            <tr>
                <th>No</th>
                <th>NISN</th>
                <th>Nama Santri</th>
                <th>L/P</th> <th>Tanggal Lahir</th> <th>Alamat Santri</th>
                <th>Nama Wali</th> <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $data = mysqli_query($conn, "SELECT * FROM santri");
            while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['nisn']; ?></td>
                    <td><?php echo $d['nama_lengkap']; ?></td>
                    
                    <td><?php echo $d['jenis_kelamin']; ?></td>
                    <td><?php echo ($d['tanggal_lahir'] != '0000-00-00') ? date('d-m-Y', strtotime($d['tanggal_lahir'])) : '-'; ?></td>
                    <td><?php echo $d['alamat']; ?></td>
                    <td><?php echo $d['nama_wali']; ?></td>
                    
                    <td><span class="badge badge-green"><?php echo $d['status_aktif']; ?></span></td>
                    <td>
                        <!-- Tombol Edit -->
                        <a href="edit_santri.php?id=<?php echo $d['id_santri']; ?>"class="btn-edit-small"><i class="fas fa-edit"></i></a>
                        
                        <!-- Tombol Hapus dengan Konfirmasi -->
                        <a href="hapus_santri.php?id=<?php echo $d['id_santri']; ?>"class="btn-delete-small" 
                        onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php 
            }
            ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>
