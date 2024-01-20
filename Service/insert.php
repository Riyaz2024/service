<?php
include 'config.php';

// Check if the form is submitted
if (isset($_POST['update'])) {
    // Check if the required parameters are provided
    if (isset($_POST['id'], $_POST['pan_number'], $_POST['person_name'])) {
        $id = $_POST['id'];
        $panNumber = mysqli_real_escape_string($con, $_POST['pan_number']);
        $personName = mysqli_real_escape_string($con, $_POST['person_name']);

        // Update the record in the database
        $query = "UPDATE `pdf_files` SET `pan_number` = '$panNumber', `person_name` = '$personName' WHERE `id` = '$id'";
        mysqli_query($con, $query);

        // Handle PDF file updates
        if (!empty($_FILES['pdf_photo']['tmp_name'])) {
            $fileNamePhoto = $_FILES['pdf_photo']['name'];
            $fileContentPhoto = file_get_contents($_FILES['pdf_photo']['tmp_name']);
            $fileContentPhoto = mysqli_real_escape_string($con, $fileContentPhoto);

            // Update the file data in the database
            $queryUpdatePhoto = "UPDATE `pdf_files` SET `file_name` = '$fileNamePhoto', `file_data` = '$fileContentPhoto' WHERE `id` = '$id'";
            mysqli_query($con, $queryUpdatePhoto);
        }

        if (!empty($_FILES['pdf_signature']['tmp_name'])) {
            $fileNameSignature = $_FILES['pdf_signature']['name'];
            $fileContentSignature = file_get_contents($_FILES['pdf_signature']['tmp_name']);
            $fileContentSignature = mysqli_real_escape_string($con, $fileContentSignature);

            // Update the file data in the database
            $queryUpdateSignature = "UPDATE `pdf_files` SET `file_name` = '$fileNameSignature', `file_data` = '$fileContentSignature' WHERE `id` = '$id'";
            mysqli_query($con, $queryUpdateSignature);
        }

        // Redirect back to the index page after updating
        header("Location: index2.php");
        exit();
    } else {
        // Handle the case where required parameters are missing
        echo 'Invalid request.';
    }
} elseif (isset($_GET['id'])) {
    // Fetch the existing data for the selected record
    $id = $_GET['id'];
    $result = mysqli_query($con, "SELECT * FROM `pdf_files` WHERE `id` = '$id'");
    $row = mysqli_fetch_assoc($result);
} else {
    // Handle the case where the ID parameter is missing
    echo 'Invalid request.';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Record</title>
</head>
<body>
    <h2>Update Record</h2>

    <form action="update.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        
        <label for="pan_number">PAN Number:</label>
        <input type="text" name="pan_number" value="<?php echo $row['pan_number']; ?>" required><br>

        <label for="person_name">Person Name:</label>
        <input type="text" name="person_name" value="<?php echo $row['person_name']; ?>" required><br>

        <label for="pdf_photo">UPLOAD PDF OF PERSON PASSPORT SIZE PHOTO:</label>
        <input type="file" name="pdf_photo" accept=".pdf"><br>

        <label for="pdf_signature">UPLOAD PDF OF PERSON SIGNATURE:</label>
        <input type="file" name="pdf_signature" accept=".pdf"><br>

        <button type="submit" name="update">Update</button>
    </form>
</body>
</html>
