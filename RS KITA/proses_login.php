<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rs_kita";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function login($username, $password, $role)
{
    global $conn;

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    $query = "SELECT * FROM Pengguna WHERE Username = '$username' AND Kata_Sandi = '$password' AND Role = '$role'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;
        return true;
    } else {
        return "Username atau password salah.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    $result = login($username, $password, $role);

    if ($result === true) {
        if ($role === "Admin") {
            header("Location: admin_dashboard.php");
        } elseif ($role === "Dokter") {
            header("Location: dokter_dashboard.php");
        } else {
            echo "Peran tidak valid.";
        }
    } else {
        echo "Login gagal: " . $result;
    }
} else {
    echo "Metode request tidak valid.";
}

$conn->close();
?>
