<?php include 'header.php'; ?>

<div class="section-header">
    <h1 class="page-title">Data Administrasi</h1>
    <div class="action-buttons">
        <a href="tambah_administrasi.php" class="btn btn-tambah">
            <i class="fas fa-plus"></i> Tambah Pembayaran
        </a>
    </div>
</div>

<div class="table-container">
    <div class="table-header">
        <span><i class="fas fa-money-check-alt"></i></span> Daftar Transaksi Pembayaran
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Santri</th>
                <th>Bulan Tagihan</th>
                <th>Jumlah Bayar</th>
                <th>Tanggal Bayar</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            // Query langsung ke tabel administrasi tanpa JOIN karena kolom Nama_santri sudah ada
            $query = "SELECT santri.nama_lengkap, administrasi.* FROM administrasi 
                      JOIN santri ON administrasi.id_santri = santri.id_santri";
            $data = mysqli_query($conn, $query);


            // Cek jika query berhasil
            if (!$data) {
                echo "<tr><td colspan='7' style='text-align:center; color:red;'>Gagal mengambil data: " . mysqli_error($conn) . "</td></tr>";
            } elseif (mysqli_num_rows($data) == 0) {
                echo "<tr><td colspan='7' style='text-align:center;'>Belum ada data pembayaran.</td></tr>";
            } else {
                while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['nama_lengkap']; ?></td>
                        <td><?php echo $d['bulan_tagihan']; ?></td>
                        <td>Rp <?php echo number_format($d['jumlah_bayar'], 0, ',', '.'); ?></td>
                        <td><?php echo date('d-m-Y', strtotime($d['tanggal_bayar'])); ?></td>
                        <td>
                            <?php if($d['status_bayar'] == 'lunas') : ?>
                                <span class="badge badge-green">Lunas</span>
                            <?php else : ?>
                                <span class="badge" style="background:#f1c40f; color:white;">Belum Lunas</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="edit_administrasi.php?id=<?php echo $d['id_bayar']; ?>" class="btn-action btn-edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="hapus_administrasi.php?id=<?php echo $d['id_bayar']; ?>" 
                               class="btn-action btn-delete" 
                               onclick="return confirm('Yakin ingin menghapus data ini?')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php 
                }
            }
            ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>