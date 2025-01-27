<?php include "koneksi.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Buku</title>
</head>
<body>

<?php
$error_messages = "";
if(isset($_POST["simpan"])){
    $id_buku = $_POST["id_buku"];
    $judul_buku = $_POST["judul_buku"];
    $penulis = $_POST["penulis"];
    $penerbit = $_POST["penerbit"];
    $tahun_terbit = $_POST["tahun_terbit"];
    $nama_rak = $_POST["nama_rak"];
    $kategori = $_POST["kategori"];
    $waktu = date("Y-m-d H:i:s"); // Waktu saat ini (timestamp)

    // Memeriksa apakah id_buku sudah ada dalam database
    $query_check = "SELECT * FROM buku WHERE id_buku = '$id_buku'";
    $result_check = mysqli_query($konek, $query_check);

    if (mysqli_num_rows($result_check) > 0) {
        $error_messages = "Kode buku sudah digunakan, harap menggunakan kode buku yang lain";
    } else {
        // Jika id_buku belum ada, lakukan operasi INSERT
        $query = mysqli_query($konek, "INSERT INTO `buku`(`id_buku`, `judul_buku`, `penulis`, `penerbit`, `tahun_terbit`, `nama_rak`, `kategori`, `waktu`) VALUES ('$id_buku','$judul_buku','$penulis', '$penerbit', '$tahun_terbit','$nama_rak', '$kategori', '$waktu')");

        if($query) {
            $error_messages = "Berhasil menyimpan data";
        } else {
            $error_messages = "Maaf, Anda gagal menyimpan data";
        }
    }
}
?>


<div class="form-wrapper">
     <!-- Menampilkan pesan kesalahan di atas form wrapper -->
     <?php if (!empty($error_messages)) { ?>
        <p><?php echo $error_messages; ?></p>
    <?php } ?>
    <h3>SOLOTECH UNIVERSITY</h3>
    <h3>Silahkan menambahkan data buku</h3>
    <a href="databuku.php" class="data-buku">Data Buku</a> <br> <br>
    <div class="form-container">
        <form method="post" action="" name="myForm" onsubmit="return validateForm()">
            ID Buku<br>
            <input type="text" name="id_buku" id="hadir"><br/>
           Judul Buku<br>
           <input type="text" name="judul_buku" id="hadir"><br/>
            Penulis<br>
          <input type="text" name="penulis" id="hadir"><br/>
          Penerbit<br>
           <input type="text" name="penerbit" id="hadir"><br/>
           Tahun terbit<br>
            <input type="number" name="tahun_terbit" id="hadir"><br/>
            Nama Rak<br>
           <input type="text" name="nama_rak" id="hadir"><br/>
           Kategori<br>
           <input type="text" name="kategori" id="hadir"><br/>
           <br>
           <input type="submit" name="simpan" value="Simpan">
        </form>
    </div>
    <a href="homepageadmin.php" class="tombol-back">BACK</a>
</div>
</body>

<script>
function validateForm() {
    var idBuku = document.forms["myForm"]["id_buku"].value;
    var judulBuku = document.forms["myForm"]["judul_buku"].value;
    var penulis = document.forms["myForm"]["penulis"].value;
    var penerbit = document.forms["myForm"]["penerbit"].value;
    var tahunTerbit = document.forms["myForm"]["tahun_terbit"].value;
    var namaRak = document.forms["myForm"]["nama_rak"].value;
    var kategori = document.forms["myForm"]["kategori"].value;

    if (idBuku == "" || judulBuku == "" || penulis == "" || penerbit == "" || tahunTerbit == "" || namaRak == "" || kategori == "") {
        alert("Semua kolom harus diisi!");
        return false;
    }
}
</script>
</html>

<style>
body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 120vh;
    margin: 0;
    background-image: linear-gradient(to bottom, #5282C9, #ffffff);
}
.container {
    width: 95%;
    text-align: right;
}
.form-container {
    text-align: center;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 20px;
    background-color: linear-gradient(to bottom, #5282C9, #ffffff); /* Warna persegi panjang abu-abu */
    width: 400px; /* Lebar persegi panjang */
}        
.form-container label {
    display: block;
    margin-bottom: 8px;
}
.form-container input {
    width: calc(100% - 16px); /* Lebar input dikurangi margin */
    padding: 8px;
    margin-bottom: 16px;
    box-sizing: border-box;
}
.form-container button {
    background-color: #4caf50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
input[type="text"],
input[type="number"] {
    width: calc(100% - 20px); /* Lebar kotak input */
    height: 30px; /* Tinggi kotak input */
    margin-bottom: 10px;
    font-size: 16px; /* Ukuran font teks di dalam kotak input */
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
.data-buku {
    display: inline-block;
    padding: 5px 20px;
    background-color: black;
    color: white;
    text-decoration: none;
    border: none;
    border-radius: 4px;
}
</style>