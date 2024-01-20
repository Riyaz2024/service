$result = $conn->query("INSERT INTO user_data (aadhaar_number, utr_number, pan_number) VALUES ('$aadhaarNumber', '$utrNumber', 'Not Available')");

if (!$result) {
    die("Data insertion failed: " . $conn->error);
}
