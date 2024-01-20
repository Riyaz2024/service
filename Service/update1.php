<?php
include 'config1.php';

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $recordId = mysqli_real_escape_string($con, $_GET['id']);

    // Fetch existing data for the selected record
    $query = "SELECT * FROM `gruhalashmi` WHERE `id` = '$recordId'";
    $result = mysqli_query($con, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($con));
    }

    $row = mysqli_fetch_assoc($result);

    // Handle form submission for updating the record
    if (isset($_POST['update'])) {
        $newAdharNumber = isset($_POST['new_adhar_number']) ? mysqli_real_escape_string($con, $_POST['new_adhar_number']) : $row['adhar_number'];
        $newRationCardNumber = isset($_POST['new_ration_card_number']) ? mysqli_real_escape_string($con, $_POST['new_ration_card_number']) : $row['ration_card_number'];
        $newPersonName = isset($_POST['new_person_name']) ? mysqli_real_escape_string($con, $_POST['new_person_name']) : $row['person_name'];

        $newFileNamePhoto = isset($_FILES['new_pdf_photo']['name']) ? $_FILES['new_pdf_photo']['name'] : '';
        $newFileTmpNamePhoto = isset($_FILES['new_pdf_photo']['tmp_name']) ? $_FILES['new_pdf_photo']['tmp_name'] : '';

        // Check if a new document is uploaded
        if (!empty($newFileTmpNamePhoto)) {
            $newFileContentPhoto = file_get_contents($newFileTmpNamePhoto);
            $newFileContentPhoto = mysqli_real_escape_string($con, $newFileContentPhoto);
            $updateQuery = "UPDATE `gruhalashmi` SET 
                            `adhar_number`='$newAdharNumber', 
                            `ration_card_number`='$newRationCardNumber', 
                            `person_name`='$newPersonName', 
                            `file_name`='$newFileNamePhoto', 
                            `file_data`='$newFileContentPhoto', 
                            `upload_status`='Updated' 
                            WHERE `id`='$recordId'";
        } else {
            // If no new document is uploaded, update data without changing file details
            $updateQuery = "UPDATE `gruhalashmi` SET 
                            `adhar_number`='$newAdharNumber', 
                            `ration_card_number`='$newRationCardNumber', 
                            `person_name`='$newPersonName', 
                            `upload_status`='Updated' 
                            WHERE `id`='$recordId'";
        }

        if (mysqli_query($con, $updateQuery)) {
            echo "Record updated successfully";
            // Redirect to the main page or display a success message
            header("Location: agentgru.php");
            exit();
        } else {
            echo "Error updating record: " . mysqli_error($con);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E SERVICE SHIVAMOGGA - Update Record</title>
</head>
<body>
    <h2>E SERVICE SHIVAMOGGA - Update Record</h2>

    <!-- Form for updating data and uploading new documents -->
    <form action="update1.php?id=<?php echo $recordId; ?>" method="POST" enctype="multipart/form-data">
        <label for="new_adhar_number">ADHAR NUMBER:</label>
        <input type="text" name="new_adhar_number" value="<?php echo $row['adhar_number']; ?>" required><br>

        <label for="new_ration_card_number">RATION CARD NUMBER:</label>
        <input type="text" name="new_ration_card_number" value="<?php echo $row['ration_card_number']; ?>" required><br>

        <label for="new_person_name">PERSON NAME:</label>
        <input type="text" name="new_person_name" value="<?php echo $row['person_name']; ?>" required><br>

        <label for="new_pdf_photo">UPLOAD NEW PDF DOCUMENT (OPTIONAL):</label>
        <input type="file" name="new_pdf_photo" accept=".pdf"><br>

        <button type="submit" name="update">Update Record</button>
    </form>
</body>
</html>
