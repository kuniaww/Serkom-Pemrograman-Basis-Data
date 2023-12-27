<?php
require_once("functions.php");

if (isset($_POST['id_pasien'])) {
    $idPasien = $_POST['id_pasien'];

    // Memanggil fungsi untuk menandai pasien sebagai "Sembuh"
    recoverPatient($idPasien);
}
?>
