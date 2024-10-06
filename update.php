<?php
/*
Nama        : Maritza Ratnamaya N.
NPM         : 140810230076
Kelas       : B
Deskripsi   : Membuat web CRUD data mahasiswa
*/

include "koneksi.php";

$npm = $_GET['npm'];
$sqlGet = "SELECT * FROM data WHERE npm = '$npm'";
$queryGet = mysqli_query($koneksi, $sqlGet);
$data = mysqli_fetch_array($queryGet);
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
        <h1>Update Data Mahasiswa</h1>
        <a href="home.php">Kembali</a>
    </header>
    <form action="update.php" method="post">
        <table>
            <tr>
                <td>NPM</td>
                <td>
                    <input type="text" value="<?php echo "$data[npm]";?>" name="npm" readonly>
                </td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>
                    <input type="text" value="<?php echo "$data[nama]";?>" name="nama" required>
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>
                    <input type="text" name="alamat" value="<?php echo "$data[alamat]";?>" required>
                </td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>
                    <input type="date" value="<?php echo "$data[tgl_lhr]";?>" name="tgl_lhr" required>
                </td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>
                    <input type="radio" name="jk" value="L" required>Laki-laki
                    <input type="radio" name="jk" value="P" required>Perempuan
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td>
                    <input type="text" name="email" value="<?php echo "$data[email]";?>" required>
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
            $jk = $_POST['jk'];     
        }
        $email = $_POST['email'];

        $sqlUpdate = "UPDATE data SET nama='$nama', alamat='$alamat', tgl_lhr='$tgl_lhr', jk='$jk', email='$email' WHERE npm='$npm'";
        $queryUpdate = mysqli_query($koneksi, $sqlUpdate);

        header("location: home.php");

    }
    ?>
    </center>
</body>
</html>