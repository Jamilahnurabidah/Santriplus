<?php

include 'koneksi.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");
    $cek = mysqli_num_rows($query);

    if ($cek > 0) {
        $data = mysqli_fetch_assoc($query);
        $_SESSION['username'] = $username;
        $_SESSION['nama_admin'] = $data['nama_admin'];
        $_SESSION['status'] = "login";
        header("location:dashboard.php");
    } else {
        echo "<script>alert('Username atau Password salah!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - SantriPlus</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form method="POST" action="">
            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" required>
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit" name="login" class="btn">Masuk</button>
        </form>
    </div>
</body>
<style>
    .container{
        background: #20cde0;
        padding: 30px;
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