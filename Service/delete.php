<?php
include "db_conn.php";
if (isset($_GET["id"])) {
$id = intval($_GET["id"]);
$sql = "DELETE FROM `crud` WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
if (mysqli_stmt_affected_rows($stmt) > 0) {
        header("Location: http://localhost/Service/da.php?msg=Data deleted successfully");
        exit();
  } else {
        echo "Failed to delete data. Error: " . mysqli_error($conn);
}
 mysqli_stmt_close($stmt);
} else {
    echo "Error: No 'id' parameter provided in the URL.";
}
?>
