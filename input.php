<?php
/*
Nama        : Maritza Ratnamaya N.
NPM         : 140810230076
Kelas       : B
Deskripsi   : Membuat web CRUD data mahasiswa
*/

include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Data Mahasiswa</title>
</head>
<body>
<center>
<header>
        <h1>Input Data Mahasiswa</h1>
        <a href="home.php">Kembali</a>
    </header>
    <form action="input.php" method="post">
        <table>
            <tr>
                <td><strong>NPM</strong></td>
                <td>
                    <input type="text" placeholder="Masukkan NPM" name="npm" required>
                </td>
            </tr>
            <tr>
                <td><strong>Nama</strong></td>
                <td>
                    <input type="text" placeholder="Masukkan nama" name="nama" required>
                </td>
            </tr>
            <tr>
                <td><strong>Alamat</strong></td>
                <td>
                    <textarea name="alamat" placeholder="Masukkan alamat" required></textarea>
                </td>
            </tr>
            <tr>
                <td><strong>Tanggal Lahir</strong></td>
                <td>
                    <input type="date" placeholder="Masukkan tanggal lahir" name="tgl_lhr" required>
                </td>
            </tr>
            <tr>
                <td><strong>Jenis Kelamin</strong></td>
                <td>
                    <input type="radio" name="jk" value="L" required>Laki-laki
                    <input type="radio" name="jk" value="P" required>Perempuan
                </td>
            </tr>
            <tr>
                <td><strong>Email</strong></td>
                <td>
                    <input type="text" name="email" placeholder="Masukkan email" required>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="Simpan Data">
                </td>
            </tr>
        </table>
    </form>

    <?php
    if (isset($_POST['submit'])){
        $npm = $_POST['npm'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $tgl_lhr = $_POST['tgl_lhr'];
        if (isset($_POST['jk'])){
            $jk=$_POST['jk'];     
        } 
   
        $email = $_POST['email'];

        $sqlGet = "SELECT * FROM data WHERE npm = $npm";
        $queryGet = mysqli_query($koneksi, $sqlGet);
        $cek = mysqli_num_rows($queryGet);

        if ($cek > 0) {
            echo "<p style='color: red;'>NPM sudah terdaftar. Tidak bisa input data dengan NPM yang sama!</p>";
        } else {
            $sqlInsert = "INSERT INTO data (npm, nama, alamat, tgl_lhr, jk, email) 
                          VALUES ('$npm', '$nama', '$alamat', '$tgl_lhr', '$jk', '$email')";
            $queryInsert = mysqli_query($koneksi, $sqlInsert);

            if ($queryInsert) {
                header("location: home.php"); 
            } else {
                echo "<p style='color: red;'>Gagal menambahkan data!</p>";
            }
        }
    }
    ?>
</center>
</body>
</html>