<?php
require_once("functions.php");

// Cek apakah dokter sudah login (sesuai dengan implementasi login Anda)
// Misalnya, cek apakah dokter memiliki session yang valid.

// Contoh implementasi session (sesuaikan dengan login Anda)
session_start();
if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "Dokter") {
    // Redirect ke halaman login jika dokter belum login
    header("Location: login.php");
    exit();
}

$doctorId = $_SESSION["user_id"]; // Gantilah dengan sesuai dengan bagaimana Anda menyimpan ID dokter pada session.

// Mendapatkan daftar pasien yang ditangani oleh dokter
$patients = getDoctorPatients($doctorId);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Dokter</title>
    <!-- Tambahkan stylesheet atau CDN yang diperlukan -->
</head>

<body>
    <h1>Selamat datang, Dokter!</h1>

    <h2>Daftar Pasien Anda:</h2>

    <table>
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
            while ($row = $patients->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['ID_Pasien']}</td>";
                echo "<td>{$row['Nama_Pasien']}</td>";
                echo "<td>{$row['Alamat_Pasien']}</td>";
                echo "<td>{$row['Status']}</td>";
                echo "<td><a href='aksi_sembuh.php?id_pasien={$row['ID_Pasien']}'>Sembuhkan</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <a href="logout.php">Logout</a> <!-- Tambahkan link logout sesuai dengan implementasi logout Anda -->
</body>

</html>
