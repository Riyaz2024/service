<?php
$aadhaarNumber = '123456789012';  // Replace with an actual Aadhaar number
$utrNumber = '1234567890';        // Replace with an actual UTR number

$conn = new SQLite3('database.db');
if (!$conn) {
    die("Database connection failed: " . $conn->lastErrorMsg());
}

$result = $conn->exec("INSERT INTO user_data (aadhaar_number, utr_number) VALUES ('$aadhaarNumber', '$utrNumber')");
if (!$result) {
    die("Data insertion failed: " . $conn->lastErrorMsg());
} else {
    echo "Data inserted successfully!";
}

$conn->close();
?>
