<?php
$server="localhost";
$user = "root";
$password= "";
$database ="perpustakaan";

$konek= mysqli_connect($server,$user,$password,$database);

if(!$konek){
echo "koneksi<p>";
print "gagal";
}

?>