<?php
// tampilkan_dokter.php

// Panggil file functions.php atau file yang berisi koneksi ke database dan fungsi-fungsi lainnya
include 'functions.php';

// Ambil daftar dokter
$dokterList = getAllDoctors();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampilkan Dokter</title>
</head>
<body>

<h1>Daftar Dokter</h1>

<table border="1">
    <tr>
        <th>ID Dokter</th>
        <th>Nama Dokter</th>
        <th>Spesialis</th>
    </tr>

    <?php
    while ($dokter = $dokterList->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$dokter['ID_Dokter']}</td>";
        echo "<td>{$dokter['Nama_Dokter']}</td>";
        echo "<td>{$dokter['Spesialis']}</td>";
        echo "</tr>";
    }
    ?>
</table>

<!-- Tombol Kembali ke Dashboard -->
<a href="dashboard.php">Kembali ke Dashboard</a>

</body>
</html>
