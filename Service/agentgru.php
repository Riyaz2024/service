<?php
include 'config1.php';

// Handle file upload
if (isset($_POST['upload'])) {
    $adharNumber = isset($_POST['adhar_number']) ? mysqli_real_escape_string($con, $_POST['adhar_number']) : '';
    $rationCardNumber = isset($_POST['ration_card_number']) ? mysqli_real_escape_string($con, $_POST['ration_card_number']) : '';
    $personName = isset($_POST['person_name']) ? mysqli_real_escape_string($con, $_POST['person_name']) : '';
    $reason = isset($_POST['reason']) ? mysqli_real_escape_string($con, $_POST['reason']) : '';

    $fileNamePhoto = isset($_FILES['pdf_photo']['name']) ? $_FILES['pdf_photo']['name'] : '';
    $fileTmpNamePhoto = isset($_FILES['pdf_photo']['tmp_name']) ? $_FILES['pdf_photo']['tmp_name'] : '';

    if (!empty($fileTmpNamePhoto)) {
        $fileContentPhoto = file_get_contents($fileTmpNamePhoto);
        $fileContentPhoto = mysqli_real_escape_string($con, $fileContentPhoto);
        $queryPhoto = "INSERT INTO `gruhalashmi` (`adhar_number`, `ration_card_number`, `person_name`, `reason`, `file_name`, `file_data`, `upload_status`) VALUES ('$adharNumber', '$rationCardNumber', '$personName', '$reason', '$fileNamePhoto', '$fileContentPhoto', 'Uploaded')";
        mysqli_query($con, $queryPhoto);
    } else {
        // If no file is uploaded, insert data without file details
        $queryWithoutFile = "INSERT INTO `gruhalashmi` (`adhar_number`, `ration_card_number`, `person_name`, `reason`, `upload_status`) VALUES ('$adharNumber', '$rationCardNumber', '$personName', '$reason', 'Data Entered')";
        mysqli_query($con, $queryWithoutFile);
    }
}

// Fetch PDF files from the database
$pdfFiles = mysqli_query($con, "SELECT * FROM `gruhalashmi`");

// Check if the query was successful before attempting to fetch data
if (!$pdfFiles) {
    die("Query failed: " . mysqli_error($con));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E SERVICE SHIVAMOGGA</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        form {
            margin-top: 20px;
            text-align: center;
        }

        button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>E SERVICE SHIVAMOGGA</h2>

    <!-- Form for uploading PDF files -->
    <form action="agentgru.php" method="POST" enctype="multipart/form-data">
        <label for="adhar_number">ADHAR NUMBER :</label>
        <input type="text" name="adhar_number" required><br>

        <label for="ration_card_number">RATION CARD NUMBER:</label>
        <input type="text" name="ration_card_number" required><br>

        <label for="person_name">PERSON NAME:</label>
        <input type="text" name="person_name" required><br>
        <label for="reason">Enter Reason:</label>
        <input type="text" name="reason" required><br>

       <label for="pdf_photo">UPLOAD PDF OF PERSON PASSPORT SIZE PHOTO AND SIGNATURE:</label>
       <input type="file" name="pdf_photo" accept=".pdf"><br>

        <button type="submit" name="upload">Upload</button>
    </form>

    <!-- Display PDF files and provide download links -->
    <table>
        <tr>
            <th>ID</th>
            <th>Adhar Number</th>
            <th>Ration Card Number</th>
            <th>Person Name</th>
            <th>Reason</th>
            <th>Upload Status</th>
            <th>Download gruhalskhmi status</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($pdfFiles)) : ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['adhar_number']; ?></td>
                <td><?php echo $row['ration_card_number']; ?></td>
                <td><?php echo $row['person_name']; ?></td>
                <td><?php echo $row['reason']; ?></td>
                <td><?php echo $row['upload_status']; ?></td>
                <td>
                    <a href="download1.php?id=<?php echo $row['id']; ?>" download>
                        <button>Download gruhalskhmi status</button>
                    </a>
                    <a href="update1.php?id=<?php echo $row['id']; ?>">
                    <button>Update</button>
                </a>
                <a href="delete2.php?id=<?php echo $row['id']; ?>">
                    <button>Delete</button>
                </a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
