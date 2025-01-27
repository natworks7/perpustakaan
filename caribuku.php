<?php
include "koneksi.php";

if (isset($_GET['cari'])) {
    $cari = $_GET['cari'];
    $selectedValue = $_GET['selectedValue'];

    
    switch ($selectedValue) {
        case "1":
            $data = mysqli_query($konek, "SELECT * FROM buku WHERE judul_buku LIKE '%" . $cari . "%'");
            break;
        case "2":
            $data = mysqli_query($konek, "SELECT * FROM buku WHERE penulis LIKE '%" . $cari . "%'");
            break;
        case "3":
            $data = mysqli_query($konek, "SELECT * FROM buku WHERE tahun_terbit LIKE '%" . $cari . "%'");
            break;
        case "4":
            $data = mysqli_query($konek, "SELECT * FROM buku WHERE nama_rak LIKE '%" . $cari . "%'");
            break;
        default:
            $data = mysqli_query($konek, "SELECT * FROM buku");
            break;
    }
} else {
    $data = mysqli_query($konek, "SELECT * FROM buku");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Buku</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function tampilkanInput() {
            var selectBox = document.getElementById("jumlahBuku");
            var selectedValue = selectBox.options[selectBox.selectedIndex].value;
            var inputDiv = document.getElementById("inputBuku");

            inputDiv.innerHTML = "";

            if (selectedValue === "0") {
                inputDiv.innerHTML = "<p>Pilih kriteria pencarian di atas.</p>";
            } else {
                var inputLabel = "";
                switch (selectedValue) {
                    case "1":
                        inputLabel = "Masukkan judul buku: ";
                        break;
                    case "2":
                        inputLabel = "Masukkan nama penulis: ";
                        break;
                    case "3":
                        inputLabel = "Masukkan tahun terbit: ";
                        break;
                    case "4":
                        inputLabel = "Masukkan nama rak: ";
                        break;
                    default:
                        break;
                }

                var inputElement = "<label for='inputValue'>" + inputLabel + "</label>";
                inputElement += "<input type='text' id='inputValue' name='cari' placeholder='Masukkan kata kunci'>";

                inputDiv.innerHTML = inputElement;
            }
        }
    </script>
</head>

<body>
    <h2>SOLOTECH UNIVERSITY</h2>
    <h2>Pencarian buku</h2>

    <form action="" method="GET">
        <label for="jumlahBuku">Cari:</label>
        <select id="jumlahBuku" name="selectedValue" onchange="tampilkanInput()">
            <option value="0" selected>Menu Pencarian</option>
            <option value="1">Judul buku</option>
            <option value="2">Penulis</option>
            <option value="3">Tahun Terbit</option>
            <option value="4">Nama Rak</option>
        </select>

        
        <div id="inputBuku"></div>
        <br>

        
        <button type="submit">Cari</button>
    </form>
<br>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Judul Buku</th>
            <th>Penulis</th>
            <th>Tahun terbit</th>
            <th>Nama Rak</th>
        </tr>

        <?php
        $no = 1;
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['judul_buku']; ?></td>
                <td><?php echo $d['penulis']; ?></td>
                <td><?php echo $d['tahun_terbit']; ?></td>
                <td><?php echo $d['nama_rak']; ?></td>
            </tr>
        <?php } ?>
    </table>

    <br> <br> <br> <br> <br> <br> <br>
    <a href="webpage.php" class="tombol-back">BACK</a>
</body>

</html>

<style>
    input[type=text] {
        width: 350px;
        height: 30px;
        font-size: 16px;
    }

    body {
        background-color: #FFB6C1;
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
</style>
