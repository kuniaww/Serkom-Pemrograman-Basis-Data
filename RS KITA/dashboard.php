<?php
require_once("functions.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rumah Sakit Kita</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            margin-top: 30px;
        }

        .jumbotron {
            background: url('asset/pic/jumbotron.jpg') center/cover no-repeat;
            color: #ffffff;
            padding: 20px;
            margin-bottom: 30px;
        }

        h2 {
            color: #007bff;
        }

        .visi-misi {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="jumbotron">
    <img src="asset/pic/logo.png" width="60" height="60" class="logo" alt="Logo">
        <h1 class="display-7 text-bold">Selamat datang di RS KITA</h1>
        <p class="lead display-9">Memberikan pelayanan kesehatan terbaik untuk Anda</p>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Data Kamar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tambah_pasien.php">Tambah Pasien</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tambah_kamar.php">Tambah Kamar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="hapus_pasien.php">Hapus Pasien</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Pasien_Sembuh.php">Pasien Sembuh</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tambah_dokter.php">Tambah Dokter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="hapus_dokter.php">Hapus Dokter</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Data Kamar</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Nomor Kamar</th>
                    <th>Tipe Kamar</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Menampilkan data kamar
                $rooms = getAllRooms();
                while ($row = $rooms->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['Nomor_Kamar']}</td>";
                    echo "<td>{$row['Tipe_Kamar']}</td>";

                    // Memeriksa apakah kunci 'Status' ada dalam array $row
                    $status = isset($row['Status']) ? $row['Status'] : 'N/A';

                    echo "<td>{$status}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <div class="visi-misi">
            <h2>Visi</h2>
            <p>Menjadi rumah sakit yang unggul dalam pelayanan kesehatan dan inovasi.</p>

            <h2>Misi</h2>
            <ul>
                <li>Memberikan pelayanan kesehatan berkualitas tinggi.</li>
                <li>Melakukan penelitian dan pengembangan dalam bidang kesehatan.</li>
                <li>Mendidik dan melatih tenaga kesehatan yang kompeten.</li>
            </ul>
        </div>

        <h2>Data Pasien</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID Pasien</th>
                    <th>Nama Pasien</th>
                    <th>Alamat Pasien</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Menampilkan data pasien
                $patients = getAllPatients();
                while ($row = $patients->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['ID_Pasien']}</td>";
                    echo "<td>{$row['Nama_Pasien']}</td>";
                    echo "<td>{$row['Alamat']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
