<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kamar</title>
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
        <h2>Tambah Kamar</h2>
        <form action="tambah_kamar.php" method="post">
            <div class="form-group">
                <label for="nomor_kamar">Nomor Kamar:</label>
                <input type="text" class="form-control" id="nomor_kamar" name="nomor_kamar" required>
            </div>
            <div class="form-group">
                <label for="tipe_kamar">Tipe Kamar:</label>
                <input type="text" class="form-control" id="tipe_kamar" name="tipe_kamar" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit_kamar">Tambah Kamar</button>
        </form>
        <br>
        <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>

<?php
require_once("functions.php");

if (isset($_POST['submit_kamar'])) {
    $nomor_kamar = $_POST['nomor_kamar'];
    $tipe_kamar = $_POST['tipe_kamar'];

    // Memanggil fungsi untuk menambahkan kamar baru
    addRoom($nomor_kamar, $tipe_kamar);
}
?>
