<?php
// Your database connection details
$host = 'localhost';
$user = 'your_database_username';
$password = 'your_database_password';
$database = 'user_data';

// Create a new PDO instance
try {
  $pdo = new PDO("mysql:host=$host;dbname=$database", $user, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo 'Database connection successful!';
} catch (PDOException $e) {
  die('Database connection failed: ' . $e->getMessage());
}
?>
