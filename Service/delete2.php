<?php
include 'config1.php';

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    // Sanitize the 'id' parameter to prevent SQL injection
    $recordId = mysqli_real_escape_string($con, $_GET['id']);

    // Perform the delete operation
    $query = "DELETE FROM `gruhalashmi` WHERE `id` = '$recordId'";

    if (mysqli_query($con, $query)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
} else {
    echo "Invalid record ID";
}

// Close the database connection
mysqli_close($con);
?>
