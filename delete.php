<?php
/*
Nama        : Maritza Ratnamaya N.
NPM         : 140810230076
Kelas       : B
Deskripsi   : Membuat web CRUD data mahasiswa
*/

include "koneksi.php";

$npm = $_GET['npm'];
$sqlDelete = "DELETE FROM data WHERE npm = '$npm'";
mysqli_query($koneksi, $sqlDelete);
header("location: home.php");
?>