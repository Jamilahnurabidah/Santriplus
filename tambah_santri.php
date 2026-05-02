<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nisn    = $_POST['nisn'];
    $nama    = $_POST['nama_lengkap'];
    $jk      = $_POST['jenis_kelamin'];
    $tgl     = $_POST['tanggal_lahir']; 
    $alamat  = $_POST['alamat'];        
    $wali    = $_POST['nama_wali'];     

    // Masukkan ke query INSERT
    $query = "INSERT INTO santri (nisn, nama_lengkap, jenis_kelamin, tanggal_lahir, alamat, nama_wali, status_aktif) 
              VALUES ('$nisn', '$nama', '$jk', '$tgl', '$alamat', '$wali', 'aktif')";

    $hasil = mysqli_query($conn, $query);
    

    if ($hasil) {
        echo "<script>alert('Data Berhasil Disimpan'); window.location='index.php';</script>";
    } else {
        echo "Gagal simpan: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <title>SantriPlus - Input Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Data Santri</h2>
        <form action="" method="POST">
            <div class="input-group">
                <label>NISN</label>
                <input type="text" name="nisn" required placeholder="Masukkan NISN">
            </div>
            <div class="input-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama_lengkap" required placeholder="Nama santri">
            </div>
            <div class="input-group">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin">
                    <option value="L">Lelaki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>

            <div class="input-group">
                <label>Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" required>
            </div>

            <div class="input-group">
                <label>Alamat Santri</label>
                <input type="text" name="alamat" required placeholder="Alamat santri">
            </div>

            <div class="input-group">
                <label>Nama Wali</label>
                <input type="text" name="nama_wali" required placeholder="Nama orang tua/wali">
            </div>

            <button type="submit" name="submit" class="btn">Simpan Data</button>
        </form>
    </div>
</body>

<style>
/* Container Utama */
.container {
    background: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    max-width: 800px;
    margin: 20px auto;
}

h2 {
    color: #333;
    border-bottom: 2px solid #3498db;
    padding-bottom: 10px;
    margin-bottom: 25px;
}

/* Group Input: Membuat Label dan Input sejajar */
.input-group {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

/* Gaya Label (Sebelah Kiri) */
.input-group label {
    width: 200px; /* Lebar area label */
    font-weight: bold;
    color: #555;
    text-align: right;
    padding-right: 20px;
}

/* Gaya Input/Select (Sebelah Kanan) */
.input-group input, 
.input-group select, 
.input-group textarea {
    flex: 1; /* Mengambil sisa ruang yang ada */
    padding: 10px 15px;
    border: 1px solid #27d862;
    border-radius: 4px;
    font-size: 14px;
    background-color: #f9f9f9;
    transition: border 0.3s;
}

.input-group input:focus {
    border-color: #3498db;
    outline: none;
    background-color: #3bcb61;
}

.radio-group {
    display: flex;
    gap: 20px;
}

.radio-item {
    display: flex;
    align-items: center;
    gap: 5px;
}

/* Tombol Simpan */
.btn {
    background-color: #3498db;
    color: white;
    padding: 12px 25px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
    margin-left: 200px; /* Agar sejajar dengan kotak input */
    transition: background 0.3s;
}

.btn:hover {
    background-color: #2980b9;
}
</style>
</html>


