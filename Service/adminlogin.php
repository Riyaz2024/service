<?php
session_start();

$con = mysqli_connect('localhost', 'root', '', 'admin_db');
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $stmt = $con->prepare("SELECT id, password FROM admins WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($id, $hashedPassword);
    $stmt->fetch();
    $stmt->close();

    if (password_verify($password, $hashedPassword)) {
        // Authentication successful
        $_SESSION['login_user'] = $username;
        header("location: https://0c0c-2401-4900-369f-aa78-65e3-1a39-56f2-25df.ngrok-free.app/service/admin2.php#");
        exit();
    } else {
        // Authentication failed
        $error = "Invalid username or password";
    }
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN LOGIN PAGE</title>
    <link rel="stylesheet" href="https://0c0c-2401-4900-369f-aa78-65e3-1a39-56f2-25df.ngrok-free.app/service/admin.css">
</head>
<body>
    <div class="login-container">
        <h1>E service Admin Login Page</h1>
        <form action="" method="post">
            <label for="username">Username:</label>
            <input type="text" name="username" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <button type="submit">Login</button>
            <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        </form>
    </div>
</body>
</html>
