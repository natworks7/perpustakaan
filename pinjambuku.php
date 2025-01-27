<?php include "koneksi.php";?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman Buku</title>
</head>
<body>
<?php
$error_messages = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $nomor_induk = $_POST["nomor_induk"];
    $jabatan= $_POST["pengunjung"];
    $waktu = date("Y-m-d H:i:s");

    $id_buku_array = array();
    if (isset($_POST['id_buku1']) && !empty(trim($_POST['id_buku1']))) {
        $id_buku_array[] = $_POST['id_buku1'];
    }
    if (isset($_POST['id_buku2']) && !empty(trim($_POST['id_buku2']))) {
        $id_buku_array[] = $_POST['id_buku2'];
    }

    $kode_peminjaman = "PM" . date("YmdHis") . "001";

    if (count($id_buku_array) == 2) {
        $kode_peminjaman .= ""; 
    }

    if (!empty($nama) && !empty($nomor_induk) && !empty($id_buku_array)) {
        
        $query_check_jumlah = "SELECT COUNT(*) as jumlah_pinjaman FROM peminjaman WHERE nomor_induk = '$nomor_induk'";
        $result_check_jumlah = mysqli_query($konek, $query_check_jumlah);
        $row = mysqli_fetch_assoc($result_check_jumlah);
        $jumlah_pinjaman = $row['jumlah_pinjaman'];

        if ($jumlah_pinjaman + count($id_buku_array) > 2) {
            $error_messages = "Anda meminjam lebih dari dua buku,<br>harap mengembalikan salah satu buku jika Anda ingin meminjam buku baru.";
        } else {
            $error = false;

            foreach ($id_buku_array as $id_buku) {
                
                $query_check = "SELECT * FROM peminjaman WHERE id_buku = '$id_buku'";
                $result_check = mysqli_query($konek, $query_check);

                if (mysqli_num_rows($result_check) > 0) {
                    $error = true;
                    $error_messages = "Buku yang akan Anda pinjam masih dipakai oleh pengguna lain.<br>Silahkan masukkan ID buku dengan benar.";
                    break;
                }
            }

            if (!$error) {
                foreach ($id_buku_array as $id_buku) {
                    $jumlah_hari = 7;
                    $query = "INSERT INTO peminjaman (kode_peminjaman, nama, jabatan, nomor_induk, id_buku, jumlah_hari, waktu) VALUES ('$kode_peminjaman', '$nama', '$jabatan', '$nomor_induk', '$id_buku', $jumlah_hari, '$waktu')";
                    $result = mysqli_query($konek, $query);
                    if (!$result) {
                        $error_messages = "Terjadi kesalahan saat menyimpan data peminjaman: " . mysqli_error($konek);
                        break;
                    }

                    
                    if (count($id_buku_array) == 2) {
                        $kode_peminjaman++; 
                    }
                }

                if ($result) {
                    $error_messages = "Data peminjaman berhasil disimpan!<br>Silahkan meminta konfirmasi kepada petugas perpustakaan.";
                }                
            }
        }
    } else {
        $error_messages = "Harap isi semua kolom sebelum melakukan peminjaman!";
    }
}
?>

<div class="form-wrapper">
     
     <?php if (!empty($error_messages)) { ?>
        <p><?php echo $error_messages; ?></p>
    <?php } ?>

    
    <h3>SOLOTECH UNIVERSITY</h3>
    <h3>Peminjaman Buku</h3>
    <div class="form-container">
        <form method="POST">
            <label for="nama">Nama Lengkap:</label><br>
            <input type="text" id="nama" name="nama"><br>
            <select name="pengunjung" id="pengunjung">
                <option value="Dosen">Dosen</option>
                <option value="Mahasiswa">Mahasiswa</option>
            </select><br>
            <label for="nomorinduk">Nomor Induk:</label><br>
            <input type="text" id="nomor_induk" name="nomor_induk"><br><br>
            
            
            <select id="jumlahBuku" onchange="tampilkanInput()">
                <option value="0" selected>JUMLAH BUKU</option>
                <option value="1">1 buku</option>
                <option value="2">2 buku</option>
            </select>
            <div id="inputBuku"></div>
            <br>
            <div class="peraturan-container">
            <input type="checkbox" id="peraturan" name="peraturan">
            <label for="peraturan">Pastikan Anda mengetahui peraturan<br>pada perpustakaan. <a href="#aturan">Lihat.</a></label>
        </div>
            <div class="container">
            <button type="submit" onclick="return validateForm()">PINJAM</button>
            </div>
        </form>
    </div>
        <br><br><br>
    <div class="form-container">
    <h2>Peraturan peminjaman buku</h2>
    <p>1. Peminjaman hanya dapat diijinkan maksimal sebesar 2 buku.</p>
    <p>2. Peminjaman buku maksimal selama 7 hari. kecuali sudah memperpanjang masa peminjaman.</p>
    <p id = "aturan">3. Keterlambatan mengembalikan buku dibebani denda sebesar Rp 2.000,00; perhari.</p>
    <p>4. Jika didapati buku tercoret,  dan rusak sebagian akan  dibebani denda sebesar Rp 5.000,00.</p>
    <p>5. Menghilangkan atau merusakkan buku harus mengganti buku yang sama, sejenis atau sesuai dengan harga buku.</p>
     </div>



    
    <script>
    function tampilkanInput() {
        var select = document.getElementById("jumlahBuku");
        var jumlah = select.value;
        var inputContainer = document.getElementById("inputBuku");
        inputContainer.innerHTML = ""; 
        for (var i = 0; i < jumlah; i++) {
            var input = document.createElement("input");
            input.type = "text";
            input.name = "id_buku" + (i + 1); 
            input.placeholder = "Kode Buku " + (i + 1);
            inputContainer.appendChild(input);
            inputContainer.appendChild(document.createElement("br")); 
        }
    }

    function validateForm() {
    var checkbox = document.getElementById("peraturan");
    if (!checkbox.checked) {
        alert("Anda harus menyetujui peraturan perpustakaan untuk melakukan peminjaman.");
        return false;
    }
}
    </script>
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
}
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
.peraturan-container {
    width: 150px;
    display: flex;
    align-items: center;
    margin-bottom: 10px; 
}

.peraturan-container input[type="checkbox"] {
    margin-right: 12px; 
}

.peraturan-container label {
    display: block;
    width: 300px; 
    margin-bottom: 8px;
    text-align: left;
    white-space: nowrap;
}
</style>
