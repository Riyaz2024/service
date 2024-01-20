<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['aadhaarNumber'])) {
        $aadhaarNumber = $_POST['aadhaarNumber'];
        // Store Aadhaar number in a file (for simplicity)
        file_put_contents('aadhaar_data.txt', $aadhaarNumber . PHP_EOL, FILE_APPEND);
        echo 'Aadhaar number stored successfully.';
    } elseif (isset($_POST['utrNumber'])) {
        $utrNumber = $_POST['utrNumber'];
        // Store UTR number in a file (for simplicity)
        file_put_contents('utr_data.txt', $utrNumber . PHP_EOL, FILE_APPEND);
        echo 'UTR number stored successfully.';
    } else {
        echo 'Invalid data provided.';
    }
} else {
    echo 'Invalid request method.';
}
?>
