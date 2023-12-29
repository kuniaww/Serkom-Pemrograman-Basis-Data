<?php
// Include file functions.php
include('functions.php');

// Jika ada parameter ID_Dokter di URL, hapus dokter tersebut
if (isset($_GET['id_dokter'])) {
    $id_dokter = $_GET['id_dokter'];
    deleteDoctor($id_dokter);
}

// Ambil data dokter dari database
$allDoctors = getAllDoctors();

?>

<h2>Daftar Dokter</h2>

<table border="1">
    <tr>
        <th>ID Dokter</th>
        <th>Nama Dokter</th>
        <th>Spesialis</th>
        <th>Aksi</th>
    </tr>
    <?php while ($row = $allDoctors->fetch_assoc()) : ?>
        <tr>
            <td><?php echo $row['ID_Dokter']; ?></td>
            <td><?php echo $row['Nama_Dokter']; ?></td>
            <td><?php echo $row['Spesialis']; ?></td>
            <td><a href="hapus_dokter.php?id_dokter=<?php echo $row['ID_Dokter']; ?>">Hapus</a></td>
        </tr>
    <?php endwhile; ?>
</table>

<a href="dashboard.php">Kembali ke Dashboard</a>
