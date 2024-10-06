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
    <title>Data Mahasiswa</title>
    <style>
        header {
            background-color: #adadaa;
            color: black;
            padding: 20px; 
            text-align: center;
            margin-bottom: 2rem;
        }

        header h1 {
            margin: 1rem;
        }
        header a {
            color: #ffff;
            cursor: pointer;
            font-size: 1rem;
            margin-bottom: 1rem;
            display: inline-block;
            text-decoration: none;
            background-color: #de7d7d;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
        }
        body{
            font-family: Arial, sans-serif;
        }
        table{
            margin: 0 auto;
            width: 100%;
            border-collapse: collapse;
        }
        thead th{
            background-color: #adadaa;
            padding: 10px;
        }
        table, th, td {
            text-align: center;
            border: none;
        }
        table td {
            padding: 10px;
        }
        table tbody tr:hover {
            background-color: #f5f5f5;
            cursor: pointer;
        }
        .row a {
            margin-right: 10px;
            text-decoration: none;
            color: white;
            background-color: #007bff;
            padding: 5px 10px;
            border-radius: 4px;
        }
        .row a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <h1>Data Mahasiswa</h1>
            <a href="input.php">Tambah Data</a>
    </header>
    <div class="input">
        <table>
            <thead>
                <th>NPM</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Email</th>
                <th>Aksi</th>
            </thead>

            <?php
                $sqlGet = "SELECT * FROM data";
                $query = mysqli_query($koneksi, $sqlGet);

                while($data = mysqli_fetch_array($query)){
                    echo "
                        <tbody>
                            <tr>
                                <td>$data[npm]</td>
                                <td>$data[nama]</td>
                                <td>$data[alamat]</td>
                                <td>$data[tgl_lhr]</td>
                                <td>$data[jk]</td>
                                <td>$data[email]</td>
                                <td>
                                    <div class='row'>
                                        <a href='update.php?npm=$data[npm]'>Update</a>
                                        <a href='delete.php?npm=$data[npm]' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\");'>Delete</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    ";
                }
            ?>

        </table>
    </div>
</body>
</html>