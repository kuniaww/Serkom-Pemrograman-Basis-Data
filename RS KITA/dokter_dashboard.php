<?php
// Sambungkan ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rs_kita";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fungsi untuk mendapatkan data pasien
function getPasienData() {
    global $conn;
    $query = "SELECT * FROM Pasien";
    $result = $conn->query($query);
    
    $pasienData = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $pasienData[] = $row;
        }
    }
    
    return $pasienData;
}

// Fungsi untuk mendapatkan data kamar
function getKamarData() {
    global $conn;
    $query = "SELECT * FROM Kamar";
    $result = $conn->query($query);
    
    $kamarData = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $kamarData[] = $row;
        }
    }
    
    return $kamarData;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Dokter</title>
</head>
<body>

<h1>Dashboard Dokter</h1>

<h2>Daftar Pasien</h2>
<ul>
    <?php
    $pasienData = getPasienData();
    foreach ($pasienData as $pasien) {
        echo "<li>{$pasien['Nama_Pasien']} - {$pasien['Alamat']}</li>";
    }
    ?>
</ul>

<h2>Daftar Kamar</h2>
<ul>
    <?php
    $kamarData = getKamarData();
    foreach ($kamarData as $kamar) {
        echo "<li>{$kamar['Nomor_Kamar']} - {$kamar['Tipe_Kamar']} - {$kamar['Status']}</li>";
    }
    ?>
</ul>
<!-- Tombol Kembali -->
<a href="dashboard.php">Kembali ke Dashboard (Admin)</a>

</body>
</html>
