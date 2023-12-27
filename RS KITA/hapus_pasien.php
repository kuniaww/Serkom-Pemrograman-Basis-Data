<?php
require_once("functions.php");

// Periksa apakah parameter ID_Pasien telah diberikan
if (isset($_GET["id"])) {
    $idPasien = $_GET["id"];

    // Panggil fungsi hapusDataPasien
    $result = hapusDataPasien($idPasien);

    if ($result) {
        // Jika penghapusan berhasil, redirect ke halaman index atau halaman lainnya
        header("Location: index.php");
        exit();
    } else {
        // Jika terjadi kesalahan, tampilkan pesan kesalahan atau lakukan sesuai kebutuhan
        echo "Gagal menghapus data pasien.";
    }
} else {
    // Jika ID_Pasien tidak diberikan, tampilkan pesan kesalahan atau lakukan sesuai kebutuhan
    echo "ID Pasien tidak valid.";
}
?>
