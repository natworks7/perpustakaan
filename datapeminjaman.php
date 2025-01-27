<?php include "koneksi.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Peminjaman</title>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $query = "SELECT * FROM peminjaman WHERE konfirmasi = 'SUDAH'";
    $result = mysqli_query($konek, $query);

    if ($result_update) {
        echo "Konfirmasi peminjaman berhasil dilakukan!";
    } else {
        echo "Terjadi kesalahan saat melakukan konfirmasi peminjaman: " . mysqli_error($konek);
    }
}
?>

    <h2>Data Peminjaman Buku</h2>
    <form method="GET">
        <label for="cari">Cari Nomor Induk:</label>
        <input type="text" id="cari" name="cari">
        <button type="submit">Cari</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Kode Peminjaman</th>
                <th>Nama</th>
                <th>Nomor Induk</th>
                <th>ID Buku</th>
                <th>Judul Buku</th>
                <th>Lama peminjaman</th>
                <th>Waktu</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_GET['cari'])) {
                $cari = $_GET['cari'];
                if (!empty($cari)) {
                    $query = "SELECT * FROM peminjaman WHERE nomor_induk = '$cari' AND konfirmasi = 'SUDAH'";
                } else {
                    $query = "SELECT * FROM peminjaman WHERE konfirmasi = 'SUDAH'";
                }
            } else {
                $query = "SELECT * FROM peminjaman WHERE konfirmasi = 'SUDAH'";
            }

            $result = mysqli_query($konek, $query);

            if (mysqli_num_rows($result) > 0) {
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $no . "</td>";
                    echo "<td>" . $row['kode_peminjaman'] . "</td>";
                    echo "<td>" . $row['nama'] . "</td>";
                    echo "<td>" . $row['nomor_induk'] . "</td>";
                    echo "<td>" . $row['id_buku'] . "</td>";

                    $id_buku = $row['id_buku'];
                    $query_judul_buku = "SELECT judul_buku FROM buku WHERE id_buku = '$id_buku'";
                    $result_judul_buku = mysqli_query($konek, $query_judul_buku);
                    $row_judul_buku = mysqli_fetch_assoc($result_judul_buku);
                    $judul_buku = $row_judul_buku['judul_buku'];

                    echo "<td>" . $judul_buku . "</td>";
                    echo "<td>" . $row['jumlah_hari'] . ' hari' ."</td>";
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
    <a href="persetujuanpeminjaman.php" class="tombol-back">BACK</a>
</body>
</html>



<style>
    h2{
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

    body{
        background-color : #E5D3B3;
    }

    .container {
            width: 95%;
            text-align: right;
        }


        <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
        .tombol-back {
    position: absolute;
    top: 20px;
    left: 20px; 
    display: inline-block;
    padding: 5px 5px;
    background-color: #F58216;
    color: white;
    text-decoration: none;
    border: none;
    border-radius: 4px;
}
</style>

