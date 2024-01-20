<?php
function uploadFile($inputName, $targetDir) {
    $targetFile = $targetDir . basename($_FILES[$inputName]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES[$inputName]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    if ($_FILES[$inputName]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" && $imageFileType != "pdf") {
        echo "Sorry, only JPG, JPEG, PNG, GIF, PDF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        return "";
    } else {
        if (move_uploaded_file($_FILES[$inputName]["tmp_name"], $targetFile)) {
            return basename($_FILES[$inputName]["name"]);
        } else {
            echo "Sorry, there was an error uploading your file.";
            return "";
        }
    }
}
?>
