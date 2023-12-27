<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pasien</title>
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
        <h2>Tambah Pasien</h2>
        <form action="tambah_pasien.php" method="post">
            <div class="form-group">
                <label for="nama_pasien">Nama Pasien:</label>
                <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" required>
            </div>
            <div class="form-group">
                <label for="alamat_pasien">Alamat Pasien:</label>
                <input type="text" class="form-control" id="alamat_pasien" name="alamat_pasien" required>
            </div>
            <div class="form-group">
                <label for="id_kamar">Pilih Kamar:</label>
                <select class="form-control" id="id_kamar" name="id_kamar" required>
                    <?php
                    // Menampilkan semua daftar kamar yang tersedia
                    $kamarTersedia = getKamarTersedia();
                    foreach ($kamarTersedia as $kamar) {
                        echo "<option value='{$kamar['ID_Kamar']}'>{$kamar['Nomor_Kamar']} - {$kamar['Tipe_Kamar']}</option>";
                    }
                    ?>
    </select>
</div>

            </div>
            <button type="submit" class="btn btn-primary" name="submit_pasien">Tambah Pasien</button>
        </form>
        <br>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>

<?php
require_once("functions.php");

if (isset($_POST['submit_pasien'])) {
    $nama_pasien = $_POST['nama_pasien'];
    $alamat_pasien = $_POST['alamat_pasien'];
    $id_kamar = $_POST['id_kamar'];

    // Memanggil fungsi untuk menetapkan kamar kepada pasien
    assignRoomToPatient($nama_pasien, $alamat_pasien, $id_kamar);

    // Memanggil fungsi untuk mengupdate status kamar di index.php
    updateRoomStatusInIndex($id_kamar);
}
?>
