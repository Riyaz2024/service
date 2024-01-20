<?php
$conn = new SQLite3('database.db');
if (!$conn) {
    die("Database connection failed: " . $conn->lastErrorMsg());
} else {
    echo "Database connected successfully!";
}
$conn->close();
?>
