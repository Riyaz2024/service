<?php
// login.php

// Include server.php for necessary functions and error handling
include('server.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Placeholder logic - Replace this with your actual authentication logic
    // For example, you might have a function like authenticateUser($username, $password)
    // that returns true if the login is successful
    if (authenticateUser($username, $password)) {
        // Redirect to ad.php after successful login
        // If login fails, set an error message (you can customize this based on your needs)
        header("Location: https://8atq8zmlo9qkzzzzkvp6rw.on.drv.tw/www.Service.blog/Service/ad.php#");
        exit(); // Stop script execution after the redirection
    } else {
        // If login fails, set an error message (you can customize this based on your needs)
        array_push($errors, "Invalid username or password");
    }
}

// The rest of your HTML code for the login page
?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
    <h2>Login</h2>
  </div>
   
  <form method="post" action="login.php#">
    <?php include('errors.php'); ?>
    <div class="input-group">
      <label>Username</label>
      <input type="text" name="username" >
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="login_user">Login</button>
    </div>
    <p>
      Not yet a member? <a href="register.php">Sign up</a>
    </p>
  </form>
</body>
</html>
