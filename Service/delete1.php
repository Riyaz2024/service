<?php
include 'config.php';

// Check if the ID parameter is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare and execute the DELETE query
    $query = "DELETE FROM `pdf_files` WHERE `id` = '$id'";
    mysqli_query($con, $query);

    // Redirect back to the index page after deletion
    header("Location: index2.php");
    exit();
} else {
    // Handle the case where the ID parameter is missing
    echo 'Invalid request.';
}
?>
