<?php
require_once("functions.php");

if (isset($_POST['submit_dokter'])) {
    $nama_dokter = $_POST['nama_dokter'];
    $spesialis = $_POST['spesialis'];

    // Memanggil fungsi untuk menambahkan dokter
    addDoctor($nama_dokter, $spesialis);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Dokter</title>
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

        h2 {
            color: #007bff;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2>Tambah Dokter</h2>
        <form action="tambah_dokter.php" method="post">
            <div class="form-group">
                <label for="nama_dokter">Nama Dokter:</label>
                <input type="text" class="form-control" id="nama_dokter" name="nama_dokter" required>
            </div>
            <div class="form-group">
                <label for="spesialis">Spesialis:</label>
                <input type="text" class="form-control" id="spesialis" name="spesialis" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit_dokter">Tambah Dokter</button>
        </form>
        <br>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
