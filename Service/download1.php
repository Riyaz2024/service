<?php
include 'config1.php';

if (isset($_GET['id'])) {
    $fileId = mysqli_real_escape_string($con, $_GET['id']);

    // Fetch file details from the database
    $fileDetails = mysqli_query($con, "SELECT `file_name`, `file_data` FROM `gruhalashmi` WHERE `id` = $fileId");

    if ($fileDetails && $row = mysqli_fetch_assoc($fileDetails)) {
        $fileName = $row['file_name'];
        $fileData = $row['file_data'];

        // Set appropriate headers for file download
        header("Content-type: application/pdf");
        header("Content-Disposition: attachment; filename=$fileName");

        // Output the file content
        echo $fileData;

        exit;
    }
}

// Redirect to the main page if file details are not found
header("Location: index3.php");
exit;
?>
