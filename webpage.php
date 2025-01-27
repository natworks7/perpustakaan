<?php include "koneksi.php";?>
<!DOCTYPE html>
<html lang="en">
<head> 
  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head> 
<body>
    <?php 
if(isset($_POST["simpan"])){
    $nama= $_POST["nama"];
    $nomor_induk = $_POST["nomor_induk"];
    $jabatan= $_POST["pengunjung"];
    $keterangan= $_POST["keterangan"];
    $query = mysqli_query($konek,"INSERT INTO `daftar_hadir`(`nama`, `nomor_induk`, `jabatan`, `keterangan`, `waktu`) VALUES ('$nama','$nomor_induk', '$jabatan','$keterangan', now())");
    if($query) echo "Berhasil menyimpan data";
else echo "maaf, anda gagal menyimpan data";
}
?>
    <nav class="navbar">
        <div class="main_logo">
           <h4><a href="tampilanawal.php">Solotech University</a></h4>
            <img src="logo.png" alt="logo" />
        </div>

        <div class="menu-toggle" id="mobile-menu">
          <i class="bi bi-list"></i>
      </div>
      <ul class="nav-list">
          <li class="nav-item"><a href="caribuku.php">Pencarian Buku</a></li>
          <li class="nav-item"><a href="pinjambuku.php">Peminjaman Buku</a></li>
          <li class="nav-item"><a href="bukukembali.php">Pengembalian Buku</a></li>
         
      </ul>
</nav>

    <main>
      <form method="post" action="">
      <label for="nama">Masukan Nama :</label> <br>
      <input type="text" name="nama"> <br>
      
      <select name="pengunjung" id="pengunjung"> 
      <option value="Dosen">Dosen</option>
      <option value="Mahasiswa">Mahasiswa</option>
      </select><br>
      
      <label for="nim">Nomor Induk :</label><br>
      <input type="text" name="nomor_induk"> <br>
      <label for="keterangan">Keterangan :</label> <br>
      <input type="text" name="keterangan"> <br> <br>
      <input type="submit" name="simpan" value="Hadir">
    </form>

    <h4> List Buku Baru</a></h4>
    <?php
        $query = "SELECT judul_buku, penulis, nama_rak FROM buku WHERE waktu != '0000-00-00 00:00:00' ORDER BY waktu DESC LIMIT 3";
        $result = mysqli_query($konek, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="pemberitahuan">';
                echo '<h5>[New] ' . $row['judul_buku'] . ' oleh ' . $row['penulis'] .'</h5><br>';
                echo '<p>Letak: ' . ' Rak ' . $row['nama_rak'] . '</p><br>';
                echo '</div>';
            }
        } else {
            echo "Tidak ada buku yang tersedia.";
        }
        ?>
    </main>

    <script>
      document.getElementById('mobile-menu').addEventListener('click', function() {
    var navList = document.querySelector('.nav-list');
    navList.classList.toggle('active');
});
    </script>
</body>
</html> 

<style>
.navbar {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
        }

        .main_logo {
            display: flex;
            align-items: center;
            justify-content: center;
        }
            
.main_logo img {
    width: 100px;
    padding-left: 30px;

}

html {
    padding: 0;
    margin:0;
    box-sizing: border-box;
}

main {
            background-color: #fff;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            text-align: center;
        }

        label {
            display: block;
            margin: 10px 0;
            font-weight: bold;
        }

        input, select {
            width: 50%;
            padding: 10px;
            margin: 5px 0 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #333;
            color: white;
            padding: 10px 15px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #333;
        }



nav {
    background-color: rgb(40, 40, 252);
    display: flex;
    justify-content: space-between;
    padding: 1em 2em;

}

nav ul {
    display: flex;
    align-items: center;
    gap: 1em;
    list-style: none;
}

h4 a {
            display: block;
            color: white; 
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
        }

.pemberitahuan {
            border: 1px solid #ddd;
            padding: 10px; 
            margin-bottom: 10px; 
            background-color: #f9f9f9; 
        }

.pemberitahuan h5 {
            margin: 0; 
        }

.navbar {
    background-color: rgb(11, 79, 181);
    padding: 20px;
    display: flex;
    justify-content: space-between;
}

.nav-list {
    list-style: none;
    display: flex;
    margin: 0;
    padding: 0;
}

.nav-item {
    margin-right: 20px;
}

.nav-item a {
    text-decoration: none;
    color: white;
    font-weight: bold;
}

.menu-toggle {
    display: none;
    cursor: pointer;
    color: white;
    font-size: 1.5rem;
}

@media (max-width: 768px) {
    .menu-toggle {
        display: block;
    }

    .nav-list {
        display: none;
        flex-direction: column;
        width: 100%;
        text-align: center;
        position: absolute;
        top: 60px;
        left: 0;
        background-color: #333;
    }

    .nav-item {
        margin-right: 0;
        margin-bottom: 10px;
    }

    .nav-list.active {
        display: flex;
    }


    </style>