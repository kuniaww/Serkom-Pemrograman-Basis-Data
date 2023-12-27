<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rs_kita";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fungsi untuk memeriksa apakah kamar sudah terisi
function isRoomOccupied($id_kamar)
{
    global $conn;

    $check_query = "SELECT Status FROM Kamar WHERE ID_Kamar = '$id_kamar'";
    $result = $conn->query($check_query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['Status'] === 'Terisi';
    } else {
        return false;
    }
}

// Fungsi untuk memberikan kamar kepada pasien
function assignRoomToPatient($nama_pasien, $alamat_pasien, $id_kamar)
{
    global $conn;

    if (isRoomOccupied($id_kamar)) {
        echo "Kamar sudah terisi.";
        return;
    }

    $insert_query = "INSERT INTO Pasien (Nama_Pasien, Alamat_Pasien) VALUES ('$nama_pasien', '$alamat_pasien')";
    if ($conn->query($insert_query) === TRUE) {
        $id_pasien = $conn->insert_id;
        insertRawatInap($id_pasien, $id_kamar);
        echo "Kamar berhasil diberikan kepada pasien.";
    } else {
        echo "Error: " . $insert_query . "<br>" . $conn->error;
    }
}

// Fungsi untuk menambahkan data rawat inap
function insertRawatInap($id_pasien, $id_kamar)
{
    global $conn;

    $insert_query = "INSERT INTO Rawat_Inap (ID_Pasien, ID_Kamar) VALUES ('$id_pasien', '$id_kamar')";
    if ($conn->query($insert_query) === TRUE) {
        updateRoomStatus($id_kamar, true);
    } else {
        echo "Error: " . $insert_query . "<br>" . $conn->error;
    }
}

// Fungsi untuk mengupdate status kamar
function updateRoomStatus($id_kamar, $occupied)
{
    global $conn;

    $status = $occupied ? 'Terisi' : 'Kosong';

    $update_query = "UPDATE Kamar SET Status = '$status' WHERE ID_Kamar = '$id_kamar'";
    if ($conn->query($update_query) === TRUE) {
        echo "Status kamar berhasil diperbarui.";
    } else {
        echo "Error: " . $update_query . "<br>" . $conn->error;
    }
}

// Fungsi untuk mendapatkan daftar semua kamar
function getAllRooms()
{
    global $conn;

    $query = "SELECT * FROM Kamar";
    return $conn->query($query);
}

// Fungsi untuk mendapatkan daftar semua pasien
function getAllPatients()
{
    global $conn;

    $query = "SELECT * FROM Pasien";
    return $conn->query($query);
}

// Fungsi untuk mendapatkan daftar semua dokter
function getAllDoctors()
{
    global $conn;

    $query = "SELECT * FROM Dokter";
    return $conn->query($query);
}

// Fungsi untuk mendapatkan daftar semua resep
function getAllPrescriptions()
{
    global $conn;

    $query = "SELECT * FROM Resep";
    return $conn->query($query);
}

// Fungsi untuk menambahkan data kamar baru
function addRoom($nomor_kamar, $tipe_kamar)
{
    global $conn;

    $insert_query = "INSERT INTO Kamar (Nomor_Kamar, Tipe_Kamar, Status) VALUES ('$nomor_kamar', '$tipe_kamar', 'Kosong')";
    if ($conn->query($insert_query) === TRUE) {
        echo "Kamar berhasil ditambahkan.";
    } else {
        echo "Error: " . $insert_query . "<br>" . $conn->error;
    }
}

// Fungsi untuk menambahkan data pasien baru
function addPatient($nama_pasien, $alamat_pasien)
{
    global $conn;

    $insert_query = "INSERT INTO Pasien (Nama_Pasien, Alamat_Pasien) VALUES ('$nama_pasien', '$alamat_pasien')";
    if ($conn->query($insert_query) === TRUE) {
        echo "Pasien berhasil ditambahkan.";
    } else {
        echo "Error: " . $insert_query . "<br>" . $conn->error;
    }
}

// Fungsi untuk menghapus data pasien
function deletePatient($id_pasien)
{
    global $conn;

    $delete_query = "DELETE FROM Pasien WHERE ID_Pasien = '$id_pasien'";
    if ($conn->query($delete_query) === TRUE) {
        echo "Pasien berhasil dihapus.";
    } else {
        echo "Error: " . $delete_query . "<br>" . $conn->error;
    }
}

// Fungsi untuk menandai pasien sebagai sembuh
function recoverPatient($id_pasien)
{
    global $conn;

    $update_query = "UPDATE Pasien SET Status = 'Sembuh' WHERE ID_Pasien = '$id_pasien'";
    if ($conn->query($update_query) === TRUE) {
        echo "Pasien berhasil sembuh.";
    } else {
        echo "Error: " . $update_query . "<br>" . $conn->error;
    }
}

// Fungsi untuk menambahkan data dokter baru
function addDoctor($nama_dokter, $spesialis)
{
    global $conn;

    $insert_query = "INSERT INTO Dokter (Nama_Dokter, Spesialis) VALUES ('$nama_dokter', '$spesialis')";
    if ($conn->query($insert_query) === TRUE) {
        echo "Dokter berhasil ditambahkan.";
    } else {
        echo "Error: " . $insert_query . "<br>" . $conn->error;
    }
}

// Fungsi untuk menghapus data dokter
function deleteDoctor($id_dokter)
{
    global $conn;

    $delete_query = "DELETE FROM Dokter WHERE ID_Dokter = '$id_dokter'";
    if ($conn->query($delete_query) === TRUE) {
        echo "Dokter berhasil dihapus.";
    } else {
        echo "Error: " . $delete_query . "<br>" . $conn->error;
    }
}

// Fungsi untuk menambahkan data resep
function addPrescription($id_pasien, $id_dokter, $resep)
{
    global $conn;

    $insert_query = "INSERT INTO Resep (ID_Pasien, ID_Dokter, Resep) VALUES ('$id_pasien', '$id_dokter', '$resep')";
    if ($conn->query($insert_query) === TRUE) {
        echo "Resep berhasil ditambahkan.";
    } else {
        echo "Error: " . $insert_query . "<br>" . $conn->error;
    }
}

// Fungsi untuk menghapus data resep
function deletePrescription($id_resep)
{
    global $conn;

    $delete_query = "DELETE FROM Resep WHERE ID_Resep = '$id_resep'";
    if ($conn->query($delete_query) === TRUE) {
        echo "Resep berhasil dihapus.";
    } else {
        echo "Error: " . $delete_query . "<br>" . $conn->error;
    }
}

// Fungsi untuk mendapatkan daftar kamar yang tersedia
function getAvailableRooms()
{
    global $conn;

    $query = "SELECT * FROM Kamar WHERE Status = 'Kosong'";
    return $conn->query($query);
}

// Fungsi untuk melakukan login
function login($username, $password, $role)
{
    global $conn;

    // Lakukan validasi login sesuai dengan struktur database dan tabel Pengguna
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
    $role = mysqli_real_escape_string($conn, $role);

    $query = "SELECT * FROM Pengguna WHERE Username = '$username' AND Kata_Sandi = '$password' AND Role = '$role'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        // Login berhasil
        return true;
    } else {
        // Login gagal
        $query = "SELECT * FROM Pengguna WHERE Username = '$username'";
        $result = $conn->query($query);

        if ($result->num_rows == 1) {
            return "Username tidak ditemukan.";
        } else {
            return "Peran tidak valid.";
        }
    }
}



?>
