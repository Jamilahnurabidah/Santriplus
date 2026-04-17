<?php
// Memasukkan fail koneksi database
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama_lengkap'];
    $jk = $_POST['jenis_kelamin'];

    $query = "INSERT INTO santri (nisn, nama_lengkap, jenis_kelamin) VALUES ('$nisn', '$nama', '$jk')";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data berjaya disimpan!');</script>";
    } else {
        echo "Ralat: " . mysqli_error($conn);
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
            <div>
                <div class="input-group"></div>
                <label>Alamat Santri</label>
                <input type="text" name="Alamat_Santri" required placeholder="Alamat santri">
            </div>
            <div class="input-group">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin">
                    <option value="L">Lelaki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <button type="submit" name="submit" class="btn">Simpan Data</button>
        </form>
    </div>
</body>

<style>
.container{
        background: #20cde0;
        padding: 50px;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        width: 350px;
        margin: auto;
    }
    h2{
        text-align: center;
        color: #2c3e50;
        margin-bottom: 20px;
    }
    input{
        margin-bottom: 15px;
    }
    .input-group input, .input-group select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 6px;
    box-sizing: border-box; /* Supaya padding tidak merosakkan lebar */
}

.btn {
    width: 100%;
    padding: 12px;
    border: none;
    background-color: #27ae60;
    color: white;
    font-size: 16px;
    border-radius: 6px;
    cursor: pointer;
    transition: background 0.3s;
}

.btn:hover {
    background-color: #219150;
}
</style>
</html>


