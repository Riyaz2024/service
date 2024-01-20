<?php
session_start();

$con = mysqli_connect('localhost', 'root', '', 'admin_db');
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO admins (username, password) VALUES ('$username', '$password')";
    if (mysqli_query($con, $sql)) {
        header("location: adminlogin.php");
        exit();
    } else {
        $error = "Registration failed. Please try again.";
    }
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
</head>
<body>
    <h2>Admin Registration</h2>
    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <button type="submit">Register</button>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
    </form>
</body>
</html>
