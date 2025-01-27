<?php include "koneksi.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Hadir</title>
</head>
<body>
<h2>SOLOTECH UNIVERSITY</h2>
<h2>Data Pengunjung</h2>
<form method="GET">
        <label for="cari">Cari Nomor Induk:</label>
        <input type="text" id="cari" name="cari">
        <button type="submit">Cari</button>
    </form>
<table>
        <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
             <th>Nomor Induk</th>
             <th>Jabatan</th>
             <th>Keperluan</th>
            <th>Waktu</th>
        </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_GET['cari'])) {
                $cari = $_GET['cari'];
                if (!empty($cari)) {
                    $query = "SELECT * FROM daftar_hadir WHERE nomor_induk = '$cari'";
                } else {
                    $query = "SELECT * FROM daftar_hadir";
                }
            } else {
                $query = "SELECT * FROM daftar_hadir";
            }

            $result = mysqli_query($konek, $query);

            if (mysqli_num_rows($result) > 0) {
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $no . "</td>";
                    echo "<td>" . $row['nama'] . "</td>";
                    echo "<td>" . $row['nomor_induk'] . "</td>";
                    echo "<td>" . $row['jabatan'] . "</td>";
                    echo "<td>" . $row['keterangan'] . "</td>";
                    echo "<td>" . $row['waktu'] . "</td>";
                    echo "</tr>";
                    $no++;
                }
            } else {
                echo "<tr><td colspan='7'>Belum ada pengajuan peminjaman.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="homepageadmin.php" class="tombol-back">BACK</a>
</body>
</html>

<style>
        h2 {
        text-align: center;
    }
    body {
        height: 200vh;
        background-image: linear-gradient(to bottom, #5282C9, #ffffff);
    }
    .tombol-back {
    position: absolute;
    top: 20px; /* Jarak dari atas */
    left: 20px; /* Jarak dari kiri */
    display: inline-block;
    padding: 5px 5px;
    background-color: #245399;
    color: white;
    text-decoration: none;
    border: none;
    border-radius: 4px;
}
    
    span {
    text-decoration: none;
    font-family: 'Segoe UI', sans-serif;
    color: #191919;
    font-weight: 600;
    text-align: center;
    }
input[type=text] { 
    width: 180px; 
    height: 25px; 
    font-size: 15px;
    border: 3px solid #ad2121;
}
label[for=cari]{
    font-size: 20px;      
}
.container {
    width: 95%;
    text-align: right;
}
<style>
        table {
    width: 100%;
    border-collapse: collapse;
    margin: 0 auto; 
}


        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: linear-gradient(to bottom, #5282C9, #ffffff);
        }
  
</style>