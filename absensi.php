<?php include 'header.php'; ?>

<div class="section-header">
    <h1 class="page-title">Absensi Santri</h1>
    <div class="action-buttons">
        <a href="tambah_absensi.php" class="btn btn-tambah">
            <i class="fas fa-calendar-check"></i> Input Absensi
        </a>
    </div>
</div>

<div class="table-container">
    <div class="table-header">
        <span><i class="fas fa-clipboard-list"></i></span> Daftar Kehadiran Santri
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama Santri</th>
                <th>Waktu Input</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            // Query JOIN untuk mengambil nama santri berdasarkan id_santri
            $query = "SELECT absensi.*, santri.nama_lengkap 
                      FROM absensi 
                      JOIN santri ON absensi.id_santri = santri.id_santri 
                      ORDER BY absensi.tanggal DESC, absensi.waktu_input DESC";
            
            $data = mysqli_query($conn, $query);

            if (!$data) {
                echo "<tr><td colspan='6' style='text-align:center; color:red;'>Error: " . mysqli_error($conn) . "</td></tr>";
            } elseif (mysqli_num_rows($data) == 0) {
                echo "<tr><td colspan='6' style='text-align:center;'>Belum ada data absensi hari ini.</td></tr>";
            } else {
                while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo date('d/m/Y', strtotime($d['tanggal'])); ?></td>
                        <td><strong><?php echo $d['nama_lengkap']; ?></strong></td>
                        <td><?php echo date('H:i', strtotime($d['waktu_input'])); ?> WIB</td>
                        <td>
                            <?php 
                            $ket = strtolower($d['keterangan']);
                            if($ket == 'hadir') echo "<span class='badge badge-green'>Hadir</span>";
                            elseif($ket == 'sakit') echo "<span class='badge' style='background:#3498db; color:white;'>Sakit</span>";
                            elseif($ket == 'izin') echo "<span class='badge' style='background:#f1c40f; color:white;'>Izin</span>";
                            else echo "<span class='badge' style='background:#e74c3c; color:white;'>Alpa</span>";
                            ?>
                        </td>
                        <td>
                            <a href="hapus_absensi.php?id=<?php echo $d['id_absensi']; ?>" 
                               class="btn-action btn-delete" 
                               onclick="return confirm('Hapus data absensi ini?')">
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