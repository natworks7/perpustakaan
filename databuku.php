<?php include "koneksi.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $query = "SELECT * FROM buku";
    $result = mysqli_query($konek, $query);
}
?>
    <h2>Data Buku</h2>
    <form method="GET">
        <label for="cari">Cari Judul:</label>
        <input type="text" id="cari" name="cari">
        <button type="submit">Cari</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>ID Buku</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun terbit</th>
                <th>Nama Rak</th>
                <th>Kategori</th>
                <th>Waktu</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_GET['cari'])) {
                $cari = $_GET['cari'];
                if (!empty($cari)) {
                    $query = "SELECT * FROM buku WHERE judul_buku LIKE '%" . $cari . "%'";
                } else {
                    $query = "SELECT * FROM buku";
                }
            } else {
                $query = "SELECT * FROM buku";
            }

            $result = mysqli_query($konek, $query);

            if (mysqli_num_rows($result) > 0) {
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $no . "</td>";
                    echo "<td>" . $row['id_buku'] . "</td>";
                    echo "<td>" . $row['judul_buku'] . "</td>";
                    echo "<td>" . $row['penulis'] . "</td>";
                    echo "<td>" . $row['penerbit'] . "</td>";
                    echo "<td>" . $row['tahun_terbit'] ."</td>";
                    echo "<td>" . $row['nama_rak'] . "</td>";
                    echo "<td>" . $row['kategori'] . "</td>";
                    echo "<td>" . $row['waktu'] . "</td>";
                    echo "</tr>";
                    $no++;
                }
            } else {
                echo "<tr><td colspan='7'>Tidak ada data buku yang dicari.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="inputbuku.php" class="tombol-back">BACK</a>
</body>
</html>

<style>
h2 {
    text-align: center;
}
html{
    background-color: #5282C9;
}
.tombol-back {
    display: inline-block;
    padding: 10px 20px;
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
table {
    width: 100%;
    margin: 0 auto;
}
th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
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
</style>