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
    if (isset($_POST['kode_peminjaman'])) {
        $kode_peminjaman = $_POST['kode_peminjaman'];
        $query_update = "UPDATE peminjaman SET konfirmasi = 'SUDAH' WHERE kode_peminjaman = '$kode_peminjaman'";
        $result_update = mysqli_query($konek, $query_update);
        if ($result_update) {
            echo "Konfirmasi peminjaman berhasil dilakukan!";
        } else {
            echo "Terjadi kesalahan saat melakukan konfirmasi peminjaman: " . mysqli_error($konek);
        }
    } elseif (isset($_POST['kode_peminjaman_hapus'])) {
        $kode_peminjaman_hapus = $_POST['kode_peminjaman_hapus'];
        $query_hapus = "DELETE FROM peminjaman WHERE kode_peminjaman = '$kode_peminjaman_hapus'";
        $result_hapus = mysqli_query($konek, $query_hapus);
        if ($result_hapus) {
            echo "Peminjaman berhasil dihapus!";
        } else {
            echo "Terjadi kesalahan saat menghapus peminjaman: " . mysqli_error($konek);
        }
    }
}
?>
    <h2>Persetujuan Peminjaman Buku</h2>
    <a href="homepageadmin.php" class="tombol-back">BACK</a>
    <a href="datapeminjaman.php" class="tombol-data">Data Peminjaman Buku</a> <br><br>
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
                <th>Judul buku</th>
                <th>Lama Peminjaman</th>
                <th>Waktu</th>
                <th>Konfirmasi</th>
                <th>Hapus</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_GET['cari'])) {
                $cari = $_GET['cari'];
                if (!empty($cari)) {
                    $query = "SELECT * FROM peminjaman WHERE nomor_induk = '$cari' AND konfirmasi = 'BELUM'";
                } else {
                    $query = "SELECT * FROM peminjaman WHERE konfirmasi = 'BELUM'";
                }
            } else {
                $query = "SELECT * FROM peminjaman WHERE konfirmasi = 'BELUM'";
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
                    echo "<td>" . $row['jumlah_hari']  . ' hari' ."</td>";
                    echo "<td>" . $row['waktu']  . "</td>";
                    echo "<td><form method='POST'><button type='submit' name='kode_peminjaman' value='" . $row['kode_peminjaman'] . "'>Konfirmasi</button></form></td>";
                    echo "<td><form method='POST'><button type='submit' name='kode_peminjaman_hapus' value='" . $row['kode_peminjaman'] . "'>Hapus</button></form></td>";
                    echo "</tr>";
                    $no++;
                }
            } else {
                echo "<tr><td colspan='9'>Belum ada pengajuan peminjaman.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>



<style>
    h2{
        text-align : center;
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
    display: inline-block;
    padding: 5px 5px;
    background-color: #F58216;
    color: white;
    text-decoration: none;
    border: none;
    border-radius: 4px;
}
.tombol-data {
    display: inline-block;
    padding: 5px 5px;
    background-color: black;
    color: white;
    text-decoration: none;
    border: none;
    border-radius: 4px;
}
</style>

