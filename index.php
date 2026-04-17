
<?php include 'header.php'; ?>

<div class="section-header">
    <h1 class="page-title">Data Santri</h1>
    <div class="action-buttons">
        <a href="tambah_santri.php" class="btn btn-tambah"><i class="fas fa-user-plus"></i> Tambah Santri</a>
    </div>
</div>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NISN</th>
                <th>Nama Santri</th>
                <th>Alamat Santri</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $data = mysqli_query($conn, "SELECT * FROM santri");
            while($d = mysqli_fetch_array($data)){
                echo "<tr>
                    <td>$no</td>
                    <td><span class='badge badge-green'>{$d['nisn']}</span></td>
                    <td>{$d['nama_lengkap']}</td>
                    <td>{$d['status_aktif']}</td>
                    <td>
                        <button class='btn-action btn-edit'><i class='fas fa-edit'></i></button>
                        <button class='btn-action btn-delete'><i class='fas fa-trash'></i></button>
                    </td>
                </tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>