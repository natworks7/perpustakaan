<?php include "koneksi.php";?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengembalian Buku</title>
</head>
<body>
<?php
$error_messages = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $nomor_induk = $_POST['nomor_induk'];
    $id_buku = $_POST['id_buku'];
    $tanggal_kembali = date("Y-m-d H:i:s");

    $query_select = "SELECT * FROM peminjaman WHERE nomor_induk = '$nomor_induk' AND id_buku = '$id_buku' AND konfirmasi = 'SUDAH'";
    $result_select = mysqli_query($konek, $query_select);

    if ($result_select && mysqli_num_rows($result_select) > 0) {
        $row = mysqli_fetch_assoc($result_select);
        $kode_peminjaman = $row['kode_peminjaman'];
        $jabatan = $row['jabatan'];
        $waktu_peminjaman = $row['waktu'];

        $query_check = "SELECT * FROM pengembalian WHERE kode_peminjaman = '$kode_peminjaman'";
        $result_check = mysqli_query($konek, $query_check);

        if ($result_check && mysqli_num_rows($result_check) > 0) {
            $error_messages = "Anda sudah mengajukan pengembalian untuk peminjaman ini.";
        } else {
            $query_insert = "INSERT INTO pengembalian (kode_peminjaman, nama, jabatan, nomor_induk, id_buku, tanggal_pinjam, tanggal_kembali, terlambat, denda, konfirmasi) 
                             VALUES ('$kode_peminjaman', '$nama', '$jabatan', '$nomor_induk', '$id_buku', '$waktu_peminjaman', '$tanggal_kembali', '', '', 'BELUM')";
            $result_insert = mysqli_query($konek, $query_insert);

            if ($result_insert) {
                $query_update = "UPDATE pengembalian 
                                 SET tanggal_pinjam = '$waktu_peminjaman',
                                     terlambat = CASE WHEN DATEDIFF('$tanggal_kembali', tanggal_pinjam) <= 7 THEN 0 ELSE DATEDIFF('$tanggal_kembali', tanggal_pinjam) - 7 END,
                                     denda = CASE WHEN DATEDIFF('$tanggal_kembali', tanggal_pinjam) <= 7 THEN 0 ELSE (DATEDIFF('$tanggal_kembali', tanggal_pinjam) - 7) * 2000 END,
                                     konfirmasi = 'BELUM'
                                 WHERE kode_peminjaman = '$kode_peminjaman'";
                $result_update = mysqli_query($konek, $query_update);
                
                if ($result_update) {
                    $query_delete = "DELETE FROM peminjaman WHERE kode_peminjaman = '$kode_peminjaman'";
                    $result_delete = mysqli_query($konek, $query_delete);
                    
                    if ($result_delete) {
                        $query_denda = "SELECT denda FROM pengembalian WHERE kode_peminjaman = '$kode_peminjaman'";
                        $result_denda = mysqli_query($konek, $query_denda);
                        $row_denda = mysqli_fetch_assoc($result_denda);
                        $denda = $row_denda['denda'];
                        $error_messages = "Pengajuan pengembalian berhasil diajukan!<br>Silahkan meminta konfirmasi kepada petugas perpustakaan.<br>Denda yang harus dibayar: $denda";
                    } else {
                        $error_messages = "Pengajuan pengembalian berhasil diajukan tetapi terjadi kesalahan saat memindah data peminjaman: " . mysqli_error($konek);
                    }
                } else {
                    $error_messages = "Terjadi kesalahan saat menginput tanggal pinjam pada data pengembalian: " . mysqli_error($konek);
                }
            } else {
                $error_messages = "Terjadi kesalahan saat mengajukan pengembalian: " . mysqli_error($konek);
            }
        }
    } else {
        $error_messages = "Data peminjaman tidak ditemukan atau belum dikonfirmasi.";
    }
} else {
    $error_messages = "Tidak ada data yang dikirimkan atau form tidak disubmit.";
}
?>





<div class="form-wrapper">
<?php if (!empty($error_messages)) { ?>
        <p><?php echo $error_messages; ?></p>
    <?php } ?>

        <h3>SOLOTECH UNIVERSITY</h3>
        <h3>Pengembalian Buku</h3>
        <div class="form-container">
            <form method="POST" action="">
                <label for="nama">Nama Lengkap:</label><br>
                <input type="text" id="nama" name="nama"><br>
                <label for="nomorinduk">Nomor Induk:</label><br>
                <input type="text" id="nomorinduk" name="nomor_induk"><br><br>
                <label for="idbuku">ID Buku:</label><br>
                <input type="text" id="id_buku" name="id_buku"><br><br>
                <div class="container">
                    <button type="submit" name="submit">Ajukan Pengembalian</button>
                </div>
            </form>
        </div>
        <br><br><br><br><br><br><br><br>
        <a href="webpage.php" class="tombol-back">BACK</a>
    </div>
</body>
</html>


<style>
body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
    background-color: #FFA778;
}
.container {
    width: 95%;
    text-align: right;
}   
.tombol-back {
    display: inline-block;
    padding: 5px 5px;
    background-color: #245399;
    color: white;
    text-decoration: none;
    border: none;
    border-radius: 4px;
}
.form-container {
    text-align: center;
    padding: 20px;
    border: 1px solid;
    border-radius: 5px;
    background-color: #FFA778;
    width: 320px; 
}a
.form-container label {
    display: block;
    margin-bottom: 8px;
}
.form-container input {
    width: calc(100% - 16px);
    padding: 8px;
    margin-bottom: 16px;
    box-sizing: border-box;
}
.form-container button {
    background-color: black;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
input[type="text"],
input[type="number"] {
    width: calc(100% - 20px);
    height: 30px;
    margin-bottom: 10px;
    font-size: 16px;
}
input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #245399;
    color: white;
    text-decoration: none;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
.form-wrapper {
    text-align: center;
}
</style>
