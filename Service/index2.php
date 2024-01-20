<?php
include 'config.php';

// Handle file upload
if (isset($_POST['upload'])) {
    // Check if the keys are set before using them
    $panNumber = isset($_POST['pan_number']) ? mysqli_real_escape_string($con, $_POST['pan_number']) : '';
    $personName = isset($_POST['person_name']) ? mysqli_real_escape_string($con, $_POST['person_name']) : '';
    
    // Handle upload for Passport Size Photo PDF
    $fileNamePhoto = isset($_FILES['pdf_photo']['name']) ? $_FILES['pdf_photo']['name'] : '';
    $fileTmpNamePhoto = isset($_FILES['pdf_photo']['tmp_name']) ? $_FILES['pdf_photo']['tmp_name'] : '';

    if (!empty($fileTmpNamePhoto)) {
        $fileContentPhoto = file_get_contents($fileTmpNamePhoto);
        $fileContentPhoto = mysqli_real_escape_string($con, $fileContentPhoto);
        $queryPhoto = "INSERT INTO `pdf_files` (`pan_number`, `person_name`, `file_name`, `file_data`) VALUES ('$panNumber', '$personName', '$fileNamePhoto', '$fileContentPhoto')";
        mysqli_query($con, $queryPhoto);
    }

    // Handle upload for Signature PDF
    $fileNameSignature = isset($_FILES['pdf_signature']['name']) ? $_FILES['pdf_signature']['name'] : '';
    $fileTmpNameSignature = isset($_FILES['pdf_signature']['tmp_name']) ? $_FILES['pdf_signature']['tmp_name'] : '';

    if (!empty($fileTmpNameSignature)) {
        $fileContentSignature = file_get_contents($fileTmpNameSignature);
        $fileContentSignature = mysqli_real_escape_string($con, $fileContentSignature);
        $querySignature = "INSERT INTO `pdf_files` (`pan_number`, `person_name`, `file_name`, `file_data`) VALUES ('$panNumber', '$personName', '$fileNameSignature', '$fileContentSignature')";
        mysqli_query($con, $querySignature);
    }
}

// Fetch PDF files from the database
$pdfFiles = mysqli_query($con, "SELECT * FROM `pdf_files`");
?>

<!-- Rest of your HTML code -->

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

    <!-- Display PDF files and provide download links -->
    <!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add your head content here -->
</head>
<body>
    <h2>PAN CARD PDF</h2>

    <!-- Display PDF files and provide download, update, delete links -->
    

    <!-- Form for uploading PDF files -->
    <form action="index2.php" method="POST" enctype="multipart/form-data">
        <label for="pan_number">PAN Number:</label>
        <input type="text" name="pan_number" required><br>

        <label for="person_name">Person Name:</label>
        <input type="text" name="person_name" required><br>

        <label for="pdf_photo">UPLOAD PDF OF PERSON PASSPORT SIZE PHOTO AND SIGNATURE:</label>
        <input type="file" name="pdf_photo" accept=".pdf" required><br>


        <button type="submit" name="upload">Upload</button>
    </form>
</body>
</html>
<table>
        <tr>
            <th>ID</th>
            <th>PAN Number</th>
            <th>Person Name</th>
            <th></th>
            <th></th>
            <th>Download PAN CARD</th>
            >
        </tr>
        <?php while ($row = mysqli_fetch_assoc($pdfFiles)) : ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['pan_number']; ?></td>
                <td><?php echo $row['person_name']; ?></td>
                <td></td>
                <td>
                    
                </td>
                <td>
                    <a href="download.php?id=<?php echo $row['id']; ?>&type=signature" download>
                        <button>Download PAN CARD</button>
                    </a>
                </td>
                
            </tr>
        <?php endwhile; ?>
    </table>