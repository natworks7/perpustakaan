<?php 
include 'koneksi.php';
session_start();

if (!isset($_SESSION['username'])) {
    echo "<script>alert('maaf anda belum login,silakan login terlebih dahulu'); window.location='login.php'; </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda Admin</title>
</head>
<body>

    <div class="menu-container">
        <a href="listpengunjung.php" class="menu-item">
            <img src="listpengunjung.png" alt="Ikon 1">
            <p>Daftar Hadir</p>
        </a>

        <a href="inputbuku.php" class="menu-item">
            <img src="inputbuku.png" alt="Ikon 2">
            <p>Menambahkan Buku</p>
        </a>

        <a href="persetujuanpeminjaman.php" class="menu-item">
            <img src="persetujuanpeminjaman.png" alt="Ikon 3">
            <p>Persetujuan Peminjaman</p>
        </a>

        <a href="persetujuanpengembalian.php" class="menu-item">
            <img src="persetujuanpengembalian.png" alt="Ikon 4">
            <p>Persetujuan Pengembalian</p>
        </a>
        <a href="logout.php" class="logout">
            <p>Logout</p>
        </a>
    </div>
</body>
</html>

<style>
    body {
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        background-color: #5282C9;
    }
    .menu-container {
    display: grid;
    grid-template-columns: repeat(2, 1fr); 
    gap: 30px;
}

.menu-item {
    background-color: #ccc; 
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 10px;
    text-align: center;
    border-radius: 15px;
}

.menu-item img {
    width: 80px; 
    height: auto;
    margin-bottom: 10px; 
}
.logout {
            grid-column: 2; 
            justify-self: end; 
            margin-top: 10px; 
            text-decoration: none; 
            color: black; 
            padding: 5px 10px; 
            background-color: #fff; 
            border-radius: 5px; 
        }
        </style>