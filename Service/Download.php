<?php
include 'config.php';

if (isset($_GET['id'])) {
    $fileId = $_GET['id'];

    // Retrieve file data from the database
    $result = mysqli_query($con, "SELECT * FROM `pdf_files` WHERE `id` = $fileId");
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        // Set the appropriate headers for a PDF download
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename=' . $row['file_name']);
        header('Content-Length: ' . strlen($row['file_data']));

        // Output the file data
        echo $row['file_data'];
        exit;
    }
}

echo 'File not found.';
?>
