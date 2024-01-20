<?php

$con = mysqli_connect('localhost', 'root', '', 'expertreg1');

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $aadhar = $_POST["aadhar"];
    $mobile = $_POST["mobile"];
    $serviceType = $_POST["serviceType"];

    // Insert data into the database
    $sql = "INSERT INTO expertreg (name, aadhar, mobile, service_type) VALUES ('$name', '$aadhar', '$mobile', '$serviceType')";

    if (mysqli_query($con, $sql)) {
        echo "Registration successful";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}

// Close the database connection
mysqli_close($con);

?>
