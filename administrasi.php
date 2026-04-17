<?php include 'header.php'; ?>

<div class="section-header">
    <h1 class="page-title">Data Administrasi</h1>
    <div class="action-buttons">
        <a href="tambah_administrasi.php" class="btn btn-tambah">
            <i class="fas fa-plus"></i> Tambah Administrasi
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
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            // Query untuk mengambil data dari tabel administrasi dan menggabungkan dengan nama santri
            $query = "SELECT santri.nama_lengkap, administrasi.* FROM administrasi 
                      JOIN santri ON administrasi.id_santri = santri.id_santri";
            
            $data = mysqli_query($conn, $query);

            // Cek apakah ada data atau tidak
            if(mysqli_num_rows($data) > 0) {
                while($d = mysqli_fetch_array($data)){
                    $warna_status = ($d['status_bayar'] == 'lunas') ? 'badge-green' : 'badge-blue';
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['nama_lengkap']; ?></td>
                        <td><?php echo $d['bulan_tagihan']; ?></td>
                        <td>Rp <?php echo number_format($d['jumlah_bayar'], 0, ',', '.'); ?></td>
                        <td><span class="badge <?php echo $warna_status; ?>"><?php echo $d['status_bayar']; ?></span></td>
                    </tr>
                    <?php 
                }
            } else {
                echo "<tr><td colspan='5' style='text-align:center;'>Belum ada data pembayaran.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    
</div>

<?php include 'footer.php'; ?>
