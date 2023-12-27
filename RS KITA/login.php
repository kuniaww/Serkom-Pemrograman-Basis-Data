<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Tambahkan stylesheet atau styling sesuai kebutuhan -->
</head>

<body>
    <h2>Login</h2>
    <form action="proses_login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <label for="role">Role:</label>
        <select id="role" name="role" required>
            <option value="admin">Admin</option>
            <option value="dokter">Dokter</option>
            <!-- Tambahkan opsi role lain jika diperlukan -->
        </select><br>

        <button type="submit">Login</button>
    </form>
</body>

</html>
