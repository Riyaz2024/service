<?php
include "db_conn.php";

if (isset($_GET["id"])) {
    $id = intval($_GET["id"]);

    if (isset($_POST["submit"])) {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];

        // Use prepared statement to prevent SQL injection
        $sql = "UPDATE `crud` SET `first_name`=?, `last_name`=?, `email`=?, `gender`=? WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);

        // Bind parameters
        mysqli_stmt_bind_param($stmt, "ssssi", $first_name, $last_name, $email, $gender, $id);

        // Execute the statement
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            header("Location: http://localhost/Service/da.php?msg=Data updated successfully");
            exit();
        } else {
            echo "Failed: " . mysqli_error($conn);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    }

    // Fetch the data for editing
    $sql = "SELECT * FROM `crud` WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);

    // Check if data exists
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "No data found for the given ID.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Bootstrap and Font Awesome links -->
</head>

<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
        ENTER A PAN DETAILS OF ADMIN
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Edit User Information</h3>
            <p class="text-muted">Click update after changing any information</p>
        </div>

        <?php
        if (isset($row)) {
        ?>
            <div class="container d-flex justify-content-center">
                <form action="" method="post" style="width:50vw; min-width:300px;">
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">ADHAR NUMBER:</label>
                            <input type="text" class="form-control" name="first_name" value="<?php echo $row['first_name'] ?>">
                        </div>
                        <div class="col">
                            <label class="form-label">UTR NUMBER:</label>
                            <input type="text" class="form-control" name="last_name" value="<?php echo $row['last_name'] ?>">
                        </div>
                    </div>
                <div class="col">
    <label class="form-label">PAN NUMBER:</label>
    <?php
    // Remove "@" symbol from email value
    $emailWithoutAt = str_replace('@', '', $row['email']);
    ?>
    <input type="text" class="form-control" name="email" value="<?php echo $emailWithoutAt ?>" required>
</div>

                    <div>
                        <button type="submit" class="btn btn-success" name="submit">Update</button>
                        <a href="index.php" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        <?php
        } else {
            echo "No data found for the given ID.";
        }
        ?>
    </div>

    <!-- Bootstrap JS script -->
</body>

</html>
