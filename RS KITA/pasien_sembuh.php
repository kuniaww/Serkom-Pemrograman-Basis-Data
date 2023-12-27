<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasien Sembuh</title>
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

        .sembuh-btn {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2>Data Pasien Sembuh</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID Pasien</th>
                    <th>Nama Pasien</th>
                    <th>Alamat Pasien</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once("functions.php");

                $result = getAllPatients();
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['ID_Pasien']}</td>";
                    echo "<td>{$row['Nama_Pasien']}</td>";
                    echo "<td>{$row['Alamat_Pasien']}</td>";
                    echo "<td>{$row['Status']}</td>";
                    echo "<td><button class='btn btn-success sembuh-btn' data-id='{$row['ID_Pasien']}'>Pasien Sembuh</button></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <br>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
        // Menggunakan JavaScript untuk menangani klik tombol "Pasien Sembuh"
        $(document).ready(function () {
            $(".sembuh-btn").click(function () {
                var idPasien = $(this).data("id");

                // Mengirim permintaan AJAX ke aksi_sembuh.php
                $.ajax({
                    url: "aksi_sembuh.php",
                    method: "POST",
                    data: { id_pasien: idPasien },
                    success: function (response) {
                        // Memuat ulang data pasien di halaman tanpa perlu refresh
                        location.reload();
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>

</html>
