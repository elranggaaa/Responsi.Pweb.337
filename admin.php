<?php
session_start();

// Ganti username dan password sesuai kebutuhan
$admin_username = "alya";
$admin_password = "bookhaven123";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username === $admin_username && $password === $admin_password) {
        $_SESSION["admin_logged_in"] = true;
    } else {
        $error_message = "Username atau password salah.";
    }
}

if (isset($_SESSION["admin_logged_in"]) && $_SESSION["admin_logged_in"] === true) {
    $orders = file_get_contents("orders.txt");
} else {
    $orders = null;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Book Haven</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Book Haven - Admin</h1>
    </header>

    <main>
        <?php if ($orders !== null): ?>
            <h2>Daftar Pesanan</h2>
            <pre><?php echo $orders; ?></pre>
        <?php else: ?>
            <h2>Login Admin</h2>
            <?php if (isset($error_message)): ?>
                <p style="color: red;"><?php echo $error_message; ?></p>
            <?php endif; ?>
            <form action="admin.php" method="POST">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br>
                <button type="submit">Login</button>
            </form>
        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; 2024 Book Haven. All rights reserved.</p>
    </footer>
</body>
</html>